<?php

namespace App\ShopifyApi;

use Illuminate\Support\Facades\Http;
use App\Models\ShopifyApi;
use App\Models\ApiChoose;
use Exception;

class PutJson
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



    public function putJson($nameParent = "", $nameParentID = null, $request = null,$any=null)
    {

        $this->nameParent = $nameParent;
        $this->nameParentID = $nameParentID;
        $this->request = $request;
        $this->any = $any;

        $this->checkHttp($nameParent, $nameParentID);

        $this->data = $this->protocol . $this->apikey . ':' .
            $this->password . '@' . $this->shopify_domen .
            '/admin/api/' . $this->apiversion . '/' .
            $this->nameJson . '.json';


        return $this->chooseJson($nameParent, $nameParentID, $this->request,$this->any);
    }

    public function chooseJson($nameParent, $nameParentID, $request,$any)
    {
        try {
            switch ($this->nameJson) {
                case  "variants" . "/" . $nameParentID:
                    return  $this->editVariant($request);
                    break;
                case  "products" . "/" . $nameParentID:
                    return  $this->editHeader($request);
                    break;
                case  "custom_collections" . "/" . $nameParentID:
                    if ($any=="createImage") {
                        return  $this->editimagecollections($request);
                    }else{
                        return  $this->editCollections($request);
                    }
                    break;
                case  "customers" . "/" . $nameParentID:
                    return  $this->editCustomers($request);
                    break;
                default:
                    throw new Exception("empty json");
            }
        } catch (Exception $e) {
            return 'Message:' . $e->getMessage();
        }
    }


    public function editimagecollections($image){

        $image = base64_encode(file_get_contents($image->getRealPath()));

        $this->response = Http::put($this->data, [
            "custom_collection" => [
                "image" => [
                    "attachment" => $image,
                ]
            ]
        ]);

        return $this->response->ok();
    }


    public function editCustomers($request){

        $this->response = Http::put($this->data, [
            "customer" => [
                "first_name" => $request->firstName,
                "last_name" => $request->lastName,
                "email" => $request->email,
                "phone" => $request->phone,

            ]
        ]);

        $data = $this->response->object();
        $phonError = [];
        if (!empty($data->errors->phone)) {
           foreach ($data->errors->phone as  $value) {
            $phonError[] = $value;
           }
           session()->flash("phonError",json_encode($phonError));
           return  $this->response->ok();
        }else{
            return  $this->response->ok();
        }
    }


    public function editCollections($request)
    {

        if ($request->file('file')) {
            $image = base64_encode(file_get_contents($request->file('file')->getRealPath()));
            $this->response = Http::put($this->data, [
                "custom_collection" => [
                    "image" => [
                        "attachment" => $image,
                    ]
                ]
            ]);
        }
        $this->response = Http::put($this->data, [
            "custom_collection" => [
                "title" => $request->name,
                "body_html" => $request->title,
            ]
        ]);

        return $this->response->ok();
    }


    public function editHeader($request)
    {
        $this->response = Http::put($this->data, [
            "product" => [
                "title" => $request->title,
                "body_html" => "<h4 class='sku-header'><span>" . $request->bodyHtml . "</span></h4>",
                "status" => $request->status,
            ]
        ]);
        return $this->response->ok();
    }

    public function editVariant($request)
    {
        $this->response = Http::put($this->data, [
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

    public function checkHttp($nameParent, $nameParentID)
    {
        if ($nameParentID != null) {
            $this->nameJson = $nameParent . "/" . $nameParentID;
        } else {
            $this->nameJson = $nameParent;
        }
    }
}
