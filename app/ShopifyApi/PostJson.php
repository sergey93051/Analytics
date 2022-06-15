<?php

namespace App\ShopifyApi;

use Illuminate\Support\Facades\Http;
use App\Models\ShopifyApi;
use App\Models\ApiChoose;
use Exception;

class PostJson
{
    protected $shopify_domen;
    protected $apikey;
    protected $password;
    protected $apiversion;
    protected $nameJson;
    protected $response;
    protected $any;
    protected $collects;
    private $protocol;
    private $data;
    private $request;
    protected $shopifyAPi;


    public function __construct()
    {
        if (ApiChoose::first()->exists()) {
            $this->shopifyAPi = ShopifyApi::where('SHOPIFY_DOMAIN',ApiChoose::pluck('domen')[0])->first();
        }else{
            $this->shopifyAPi = ShopifyApi::first();
        }

        $this->apikey =  $this->shopifyAPi->APIkey;
        $this->shopify_domen = $this->shopifyAPi->SHOPIFY_DOMAIN;
        $this->password = $this->shopifyAPi->Password;
        $this->apiversion =  $this->shopifyAPi->APIversion;
        $this->protocol = $this->shopifyAPi->protocol;
    }



    public function PostJson($nameParent = "", $nameParentID = null, $namechild = "", $namechildID = null, $request = null, $any = null, $collects = "")
    {

        $this->nameParent = $nameParent;
        $this->nameParentID = $nameParentID;
        $this->namechild = $namechild;
        $this->namechildID = $namechildID;
        $this->request = $request;

        $this->checkHttp($nameParent, $nameParentID, $namechild, $namechildID);

        $this->data = $this->protocol . $this->apikey . ':' .
            $this->password . '@' . $this->shopify_domen .
            '/admin/api/' . $this->apiversion . '/' .
            $this->nameJson . '.json';


        return $this->chooseJson($nameParent, $nameParentID, $namechild, $namechildID, $this->request);
    }

    public function chooseJson($nameParent, $nameParentID, $namechild, $namechildID, $request)
    {
        try {
            switch ($this->nameJson) {
                case  "products" . "/" . $nameParentID . "/" . "variants":
                    return  $this->addVariant($request);
                    break;
                case  "products" . "/" . $nameParentID . "/" . "images":
                    return  $this->addImages($request);
                    break;
                case  $nameParent == "collects":
                    return  $this->addcollectsProduct($request);
                    break;
                case  $nameParent == "custom_collections":
                    return  $this->createCollection($request);
                    break;
                default:
                    throw new Exception("empty json");
            }
        } catch (Exception $e) {
            return 'Message:' . $e->getMessage();
        }
    }

    public function createCollection($request)
    {

        $this->response = Http::post($this->data, [

                "custom_collection" => [
                    "title" => $request->name,
                    "body_html" => $request->title,
                ]
        ]);

        $data = $this->response->object();

        return $data->custom_collection->id;
    }

    public function addcollectsProduct($request)
    {

        $this->response = [];

        foreach ($request->chooseproducts as $product_id) {
            $this->response[] = Http::post($this->data, [
                "collect" => [
                    "collection_id" => $request->collect_id,
                    "product_id" => $product_id,
                ]
            ]);
        }

        foreach ($this->response as $key => $value) {
            return $value->ok();
        }
    }

    public function addImages($request)
    {

        $image = base64_encode(file_get_contents($request->file('file')->getRealPath()));

        $this->response = Http::post($this->data, [

            "image" => [
                "alt" => $request->alt,
                "attachment" => $image,
            ]
        ]);

        return $this->response->ok();
    }

    public function addVariant($request)
    {
        $this->response = Http::post($this->data, [
            "variant" => [
                "option1" => $request->option1,
                "price" => $request->price,
                "sku" => $request->sku,
                "weight" => $request->weight,
                "image_id" => $request->chooseIamge
            ]
        ]);

        return $this->response->ok();
    }

    public function checkHttp($nameParent, $nameParentID, $namechild, $namechildID)
    {
        if ($nameParentID != null && $namechildID != null) {
            $this->nameJson = $nameParent . "/" . $nameParentID . "/" . $namechild . "/" . $namechildID;
        } elseif ($nameParentID != null && $namechild != null) {
            $this->nameJson = $nameParent . "/" . $nameParentID . "/" . $namechild;
        } elseif ($nameParentID != null) {
            $this->nameJson = $nameParent . "/" . $nameParentID;
        } else {
            $this->nameJson = $nameParent;
        }
    }
}
