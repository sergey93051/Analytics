<?php

namespace App\ShopifyApi;

use Illuminate\Support\Facades\Http;
use App\Models\ShopifyApi;
use App\Models\ApiChoose;
use Exception;

class DeleteJson
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

    public function deleteJson($nameParent = "", $nameParentID = null, $namechild = "", $namechildID = null, $any = null, $collects = "")
    {

        $this->nameParent = $nameParent;
        $this->nameParentID = $nameParentID;
        $this->namechild = $namechild;
        $this->namechildID = $namechildID;

        $this->checkHttp($nameParent, $nameParentID, $namechild, $namechildID);

        $this->response = Http::delete(
            $this->protocol . $this->apikey . ':' .
                $this->password . '@' . $this->shopify_domen .
                '/admin/api/' . $this->apiversion . '/' .
                $this->nameJson . '.json'
        );

        return $this->chooseJson($nameParent, $nameParentID, $namechild, $namechildID);
    }

    public function chooseJson($nameParent, $nameParentID, $namechild, $namechildID)
    {
        try {
            switch ($this->nameJson) {
                case  "products" . "/" . $nameParentID . "/" . "variants" . "/" . $namechildID:
                    return  $this->deleteVariants();
                    break;
                case  "products" . "/" . $nameParentID . "/" . "images" . "/" . $namechildID:
                    return  $this->deleteimages();
                    break;
                case  "products" . "/" . $nameParentID:
                    return  $this->deleteProduct();
                    break;
                case  "custom_collections" . "/" . $nameParentID:
                    return  $this->deleteCollection();
                    break;
                case  "customers" . "/" . $nameParentID:
                    return  $this->deleteCustomers();
                    break;
                default:
                    throw new Exception("empty json");
            }
        } catch (Exception $e) {
            return 'Message:' . $e->getMessage();
        }
    }

    public function deleteCustomers(){
        return $this->response->ok();
    }

    public function deleteCollection()
    {
        return $this->response->ok();
    }

    public function deleteimages()
    {
        return $this->response->ok();
    }

    public function deleteVariants()
    {
        return $this->response->ok();
    }

    public function deleteProduct()
    {
        return $this->response->ok();
    }


    public function checkHttp($nameParent, $nameParentID, $namechild, $namechildID)
    {
        if ($nameParentID != null && $namechildID != null) {
            $this->nameJson = $nameParent . "/" . $nameParentID . "/" . $namechild . "/" . $namechildID;
        } elseif ($nameParentID != null && $namechildID == null) {
            $this->nameJson = $nameParent . "/" . $nameParentID;
        } else {
            $this->nameJson = $nameParent;
        }
    }
}
