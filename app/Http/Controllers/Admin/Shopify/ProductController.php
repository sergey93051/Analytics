<?php

namespace App\Http\Controllers\Admin\Shopify;

use App\Http\Controllers\Controller;
use App\Http\Requests\shopify\variantAddRequest;

use Illuminate\Http\Request;
use App\Http\Requests\shopify\imageAddRequest;
use App\Http\Requests\shopify\productEditRequest;
use App\Facades\Shopifyt;
use App\Facades\ShopifyCreate;
use App\Facades\ShopifyEdit;
use App\Facades\Shopify;



class ProductController extends Controller
{

    public function headerEditShow()
    {
        return view("admin.shopify.products.header.headerEdit")->with([
            "header" => json_decode(session()->get("header"))
        ]);
    }

    public function headerEdit(Request $request)
    {

        session()->put('header', json_encode($request->all()));

        return response(200);
    }

    public function headerUpdate(productEditRequest $request)
    {

        ShopifyEdit::putJson("products", $request->id, $request);

        return redirect()->route("shopifyProductDetalyShow", $request->id);
    }

    public function productDelete($product_id)
    {
        Shopifyt::deleteJson("products", $product_id);

        return redirect()->back();
    }

    public function productVariantsDelete(Request $request)
    {

        $idProduct = json_decode($request->id)[0];
        $idVariants = json_decode($request->id)[1];
        Shopifyt::deleteJson("products", $idProduct, "variants", $idVariants);

        return response(200);
    }

    public function imageDelete(Request $request)
    {
        $idProduct = json_decode($request->id)[0];
        $idVariants = json_decode($request->id)[1];
        Shopifyt::deleteJson("products", $idProduct, "images", $idVariants);

        return response(200);
    }

    public function imageAdd($product_id)
    {

        return view("admin.shopify.products.image.shopifyImageAdd")->with("product_id", $product_id);
    }

    public function imagecreate(imageAddRequest $request)
    {

        ShopifyCreate::postJson("products", $request->product_id, "images", null, $request);

        return redirect()->route("shopifyProductDetalyShow", $request->product_id);
    }

    public function variantAddShow($product_id)
    {
        session()->put("variant_id", $product_id);

        $productData = Shopify::getJson("products", $product_id, "productItem");

        return view("admin.shopify.products.variant.shopifyProductVariantAdd")
            ->with([
                "variant_id" => session()->get("variant_id"),
                "productImages" =>  json_encode($productData["productImages"])
            ]);
    }

    public function variantAdd(variantAddRequest $request)
    {
        ShopifyCreate::postJson("products", $request->product_id, "variants", null, $request);

        return redirect()->route("shopifyProductDetalyShow",  $request->product_id);
    }

    public function variantEdit(Request $request)
    {
        session()->put('variant', json_encode($request->all()));

        return response(200);
    }

    public function variantEditShow()
    {

        $variant = json_decode(session()->get('variant'));

        $arrayID = unserialize($variant->id);

        $productData = Shopify::getJson("products", $arrayID["product_id"], "productItem");

        return view("admin.shopify.products.variant.shopifyProductVariantEdit")
            ->with([
                'variantedit' => $variant,
                "arrayId" => unserialize($variant->id),
                "productImages" =>  json_encode($productData["productImages"])
            ]);
    }

    public function variantupdate(variantAddRequest $request)
    {

        ShopifyEdit::putJson("variants", $request->id, $request);

        return redirect()->route("shopifyProductDetalyShow", $request->product_id);
    }
}
