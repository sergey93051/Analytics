<?php

namespace App\Http\Controllers\Admin\Shopify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facades\Shopify;
use App\Facades\ShopifyCreate;
use App\Http\Requests\shopify\collectionRequest;
use App\Facades\ShopifyEdit;
use App\Facades\Shopifyt;


class CollectionController extends Controller
{
    public function shopifyCollectionShow()
    {
        $collectionData = Shopify::getJson("custom_collections");
        $collectionData = json_encode($collectionData);

        return view("admin.shopify.collection.shopifyCollection", compact('collectionData'));
    }

    public function collectionProducts($collect_id)
    {
        $findProductId = Shopify::getJson("collects", null, $collect_id);

        $takeProduct = Shopify::getJson("products", null, $findProductId, "collects");

        session()->put("takeProduct", json_encode($takeProduct));

        return response(200);
    }

    public function collectionaddProductsShow($collect_id)
    {
        $productsData = Shopify::getJson("products");
        $productsData = json_encode($productsData);
        return view("admin.shopify.collection.addProducts.productadd", compact("productsData", "collect_id"));
    }

    public function collectionaddProducts(Request $request)
    {
        ShopifyCreate::postJson("collects", null, null, null, $request);

        return redirect()->route('shopifyCollectionShow');
    }

    public function collectionEditShow()
    {
        return view("admin.shopify.collection.shopifyEditCollection")->with([
            "collection" => json_decode(session()->get("takeCollection"))
        ]);
    }

    public function collectionEdit(Request $request)
    {
        $takeCollection = $request->all();

        session()->put("takeCollection", json_encode($takeCollection));

        return response(200);
    }

    public function collectionUpdate(collectionRequest $request)
    {
        ShopifyEdit::putJson("custom_collections", $request->collect_id, $request);

        return redirect()->route('shopifyCollectionShow');
    }

    public function collectionDelete($collect_id)
    {
        Shopifyt::deleteJson("custom_collections", $collect_id);

        return redirect()->route('shopifyCollectionShow');
    }


    public function collectionCreateShow(){
        return  view("admin.shopify.collection.shopifyCreateCollection");
    }

    public function collectionCreate(collectionRequest $request){

      $custom_collections_id = ShopifyCreate::postJson("custom_collections", null , null, null, $request);

       if ($request->file("file")) {

         ShopifyEdit::putJson("custom_collections", $custom_collections_id,$request->file("file"),"createImage");

       }
       return redirect()->route('shopifyCollectionShow');
    }
}
