<?php

namespace App\ShopifyApi;


use Illuminate\Support\Facades\Http;
use App\Models\ShopifyApi;
use App\Models\ApiChoose;
use Exception;

class GetJson
{

    protected $shopify_domen;
    protected $apikey;
    protected $password;
    protected $apiversion;
    protected $nameJson;
    protected $response;
    protected $any;
    protected $collects;
    protected $protocol;
    protected $shopifyAPi;

    public function __construct()
    {
        if (ApiChoose::first()->exists()) {
            $this->shopifyAPi = ShopifyApi::where('SHOPIFY_DOMAIN', ApiChoose::pluck('domen')[0])->first();
        } else {
            $this->shopifyAPi = ShopifyApi::first();
        }

        $this->apikey =  $this->shopifyAPi->APIkey ?? '';
        $this->shopify_domen = $this->shopifyAPi->SHOPIFY_DOMAIN ?? '';
        $this->password = $this->shopifyAPi->Password ?? '';
        $this->apiversion =  $this->shopifyAPi->APIversion ?? "";
        $this->protocol = $this->shopifyAPi->protocol ?? '';
    }

    public function getJson($nameJson = "", $id = null, $any = null, $collects = "")
    {

        $this->any = $any;
        $this->collects = $collects;

        $this->checkHttp($nameJson, $id);

        $this->response = Http::get(
            $this->protocol . $this->apikey . ':' .
                $this->password . '@' . $this->shopify_domen .
                '/admin/api/' . $this->apiversion . '/' .
                $this->nameJson . '.json'
        );

        return $this->chooseJson($id);
    }

    public function chooseJson($id)
    {
        try {
            switch ($this->nameJson) {
                case "orders":
                    return $this->orders();
                    break;
                case "orders" . "/" . $id:
                    return $this->ordersItem();
                    break;
                case "customers":
                    if ($this->any == 'forexport') {
                        return $this->customersforexport();
                    } else {
                        return $this->customers();
                    }
                    break;
                case "customers" . "/" . $id:
                    return $this->customersItem();
                    break;
                case "draft_orders":
                    return $this->drafts();
                    break;
                case "products":
                    if ($this->collects == "collects") {
                        return $this->findProducts();
                    } else {
                        return $this->products();
                    }
                    break;
                case "products" . "/" . $id:
                    if ($this->any == "variants") {
                        return $this->productsVariants();
                    } elseif ($this->any == "productItem") {
                        return $this->productItem();
                    }
                    break;
                case "custom_collections":
                    return $this->collections();
                    break;
                case "collects":
                    if ($this->any) {
                        return $this->collects();
                    }
                    break;
                case "tender_transactions":
                    return $this->tenderTransaction();
                    break;
                case "checkouts":
                    if ($this->collects == "products") {
                        return $this->takeProductsId();
                    } elseif ($this->collects == "ShippingAddress") {
                        return $this->ShippingAddress();
                    } else {
                        return $this->checkouts();
                    }
                    break;
                default:
                    throw new Exception("empty json");
            }
        } catch (Exception $e) {
            return 'Message:' . $e->getMessage();
        }
    }


    public function ShippingAddress()
    {

        $data = $this->response->object();
        $take_checkoutID = $this->any;
        $jsonData = [];

        foreach ($data->checkouts as $item) {
            if ($take_checkoutID == $item->id) {

                array_push($jsonData, [
                    "country" =>  $item->shipping_address->country,
                    "city" =>  $item->shipping_address->city,
                    "province" => !empty($item->shipping_address->province) ? $item->shipping_address->province : "no",
                    "address1" => !empty($item->shipping_address->address1) ? $item->shipping_address->address1 : "no",
                    "address2" => !empty($item->shipping_address->address2) ? $item->shipping_address->address2 : "no",
                    "phone" => !empty($item->shipping_address->phone) ? $item->shipping_address->phone : "no",
                    "Postal_code" => !empty($item->shipping_address->zip) ? $item->shipping_address->zip : "no",
                    "company" => !empty($item->shipping_address->company) ? $item->shipping_address->company : "no",
                ]);
            }
        }

        return $jsonData;
    }

    public function takeProductsId()
    {
        $data = $this->response->object();
        $take_checkoutID = $this->any;
        $jsonData = [];

        foreach ($data->checkouts as $item) {
            if ($take_checkoutID == $item->id) {
                foreach ($item->line_items as $products) {
                    array_push($jsonData, [
                        "product_id" =>  $products->product_id,
                    ]);
                }
            }
        }

        return $jsonData;
    }

    public function checkouts()
    {

        $data = $this->response->object();

        $jsonData = [];
        $count = 0;

        foreach ($data->checkouts as $value) {
            $count++;
            array_push($jsonData, [
                "id" => $value->id,
                "count" => $count,
                "email" => !empty($value->email) ? $value->email : "no",
                "phone" => !empty($value->phone) ? $value->phone : "no",
                "taxes_included" => !empty($value->taxes_included) ? "yes" : "no",
                "total_weight" => $value->total_weight,
                "total_discounts" => $value->total_discounts,
                "total_price" => $value->total_price,
                "currency" => $value->currency,
                "total_tax" => $value->total_tax,
                "created_at" => $value->created_at,
                "updated_at" => $value->updated_at,
                "products_item" => "true",
                "shipping_address" => "true",

            ]);
        }
        return $jsonData;
    }

    public function tenderTransaction()
    {
        $data = $this->response->object();

        $jsonData = [];
        $count = 0;

        foreach ($data->tender_transactions as $value) {
            $count++;
            array_push($jsonData, [
                "count" => $count,
                "order_id" => $value->order_id,
                "amount" =>  $value->amount,
                "currency" => $value->currency,
                "test" => $value->test != false ? $value->test : "no",
                "payment_details" => $value->payment_details != null ? $value->payment_details : "empty",
                "payment_method" => $value->payment_method,
                "processed_at" => $value->processed_at,
            ]);
        }

        return $jsonData;
    }

    public function findProducts()
    {
        $productids = $this->any;
        $data = $this->response->object();
        $count = 0;
        $jsonData = [];

        foreach ($data->products as $value) {
            foreach ($productids as  $id) {

                if ($value->id == $id["product_id"]) {
                    $count++;
                    array_push($jsonData, [
                        "count" => $count,
                        "id" => $value->id,
                        "title" =>  $value->title,
                        "template_suffix" => $value->template_suffix ? $value->template_suffix : "no",
                        "status" => $value->status,
                        "src" => !empty($value->image->src) ? $value->image->src : "no",
                        "width" => !empty($value->image->width) ? $value->image->width : "no",
                        "height" => !empty($value->image->height) ? $value->image->height : "no",
                        "image_created_at" => !empty($value->image->created_at) ? $value->image->created_at : "no",
                        "created_at" => $value->created_at,
                        "all_details" => "all details"
                    ]);
                }
            }
        }

        return $jsonData;
    }

    public function collects()
    {
        $data = $this->response->object();
        $jsonData = [];

        foreach ($data->collects as $value) {
            if ($value->collection_id == $this->any) {
                array_push($jsonData, [
                    "product_id" =>  $value->product_id,
                ]);
            }
        }

        return $jsonData;
    }

    public function collections()
    {

        $data = $this->response->object();
        $jsonData = [];
        $count = 0;

        foreach ($data->custom_collections as $value) {
            $count++;
            array_push($jsonData, [
                "count" => $count,
                "id" => $value->id,
                "title" =>  $value->title,
                "body_html" => !empty($value->body_html) ? $value->body_html : "no",
                "published_scope" => $value->published_scope,
                "src" => !empty($value->image->src) ? $value->image->src : "no",
                "width" => !empty($value->image->width) ? $value->image->width : "no",
                "height" => !empty($value->image->height) ? $value->image->height : "no",
                "published_at" => $value->published_at,
                "dropdown" => true
            ]);
        }

        return $jsonData;
    }

    public function productsVariants()
    {
        $product = $this->response->object();

        $jsonData = [];
        foreach ($product as $item) {
            foreach ($item->variants as $value) {

                array_push($jsonData, [
                    "inventory_quantity" => $value->inventory_quantity,
                    "price" =>  $value->price,
                    "inventory_policy" => $value->inventory_policy,
                    "taxable" => $value->taxable == true ? "yes" : "no",
                    "weight" => $value->weight,
                    "weight_unit" => $value->weight_unit,
                    "option1" => $value->option1 ? $value->option1 : "no",
                    "option2" => $value->option2 ? $value->option2 : "no",
                    "option3" => $value->option3 ? $value->option3 : "no",
                    "created_at" => $value->created_at,
                    "updated_at" => $value->updated_at
                ]);
            }
        }

        return $jsonData;
    }

    public function productItem()
    {
        $product = $this->response->object();

        $productImage = [];
        $productSmall = [];
        $productvariants = [];
        $productoptions = [];
        foreach ($product as $item) {
            array_push($productSmall, [
                "id" => $item->id,
                "title" => $item->title,
                "body_html" => $item->body_html,
                "status" => $item->status,
                "published_at" => $item->published_at
            ]);
            foreach ($item->images as $value) {
                array_push($productImage, [
                    "id" => $value->id,
                    "product_id" => $value->product_id,
                    "src" => $value->src
                ]);
            }
            foreach ($item->variants as $value) {

                array_push($productvariants, [
                    "id" => $value->id,
                    "product_id" => $value->product_id,
                    "image_id" => $value->image_id,
                    "inventory_quantity" => $value->inventory_quantity,
                    "price" =>  $value->price,
                    "inventory_policy" => $value->inventory_policy,
                    "taxable" => $value->taxable == true ? "yes" : "no",
                    "weight" => $value->weight,
                    "weight_unit" => $value->weight_unit,
                    "options" => $value->title ? $value->title : "no",
                    "sku" => $value->sku ? $value->sku : "no",
                    "created_at" => $value->created_at,
                    "updated_at" => $value->updated_at
                ]);
            }
            foreach ($item->options as $value) {

                array_push($productoptions, [
                    "name" => $value->name,
                    "value" => $value->values,
                ]);
            }
        }


        return [
            "productImages" => $productImage,
            "productSmall" => $productSmall,
            "productvariants" => $productvariants,
            "productoptions" => $productoptions
        ];
    }

    public function products()
    {

        $data = $this->response->object();
        $jsonData = [];
        $count = 0;

        foreach ($data->products as $value) {
            $count++;
            array_push($jsonData, [
                "count" => $count,
                "id" => $value->id,
                "title" =>  $value->title,
                "template_suffix" => $value->template_suffix ? $value->template_suffix : "no",
                "status" => $value->status,
                "src" => !empty($value->image->src) ? $value->image->src : "no",
                "width" => !empty($value->image->width) ? $value->image->width : "no",
                "height" => !empty($value->image->height) ? $value->image->height : "no",
                "image_created_at" => !empty($value->image->created_at) ? $value->image->created_at : "no",
                "created_at" => $value->created_at,
                "all_details" => "all details",
                "delete" => true
            ]);
        }
        return $jsonData;
    }

    public function drafts()
    {

        $data = $this->response->object();
        $jsonData = [];
        $count = 0;

        foreach ($data->draft_orders as $value) {
            $count++;
            array_push($jsonData, [
                "count" => $count,
                "name" =>  $value->name,
                "email" =>  $value->email,
                "taxes_included" => $value->taxes_included == true ? "yes" : "no",
                "status" => $value->status,
                "total_price" => $value->total_price,
                "subtotal_price" => $value->subtotal_price,
                "total_tax" => $value->total_tax,
                "currency" => $value->currency,
                "completed_at" => $value->completed_at != null ? $value->completed_at : "no",
                "created_at" => $value->created_at

            ]);
        }

        return $jsonData;
    }

    public function customersItem()
    {

        $data = $this->response->object();
        $jsonData = [];
        $count = 0;

        foreach ($data as $value) {
            $count++;
            array_push($jsonData, [
                "count" => $count,
                "first_name" =>  $value->first_name,
                "last_name" =>  $value->last_name,
                "email" => $value->email,
                "phone" => !empty($value->phone) ? $value->phone : "no",
                "accepts_marketing" => $value->accepts_marketing == true ? "yes" : "no",
                "orders_count" => $value->orders_count,
                "total_spent" => $value->total_spent,
                "currency" => $value->currency,
                "tax_exempt" => $value->tax_exempt == true ? "yes" : "no",
                "created_at" => $value->created_at

            ]);
        }

        return $jsonData;
    }

    public function customersforexport()
    {
        $data = $this->response->object();
        $jsonData = [];
        $count = 0;

        foreach ($data->customers as $value) {

            foreach ($this->collects as $id) {
                if ($value->id == $id) {
                    $count++;
                    array_push($jsonData, [
                        "id" => $value->id,
                        "count" => $count,
                        "last_order_id" => $value->last_order_id,
                        "first_name" =>  $value->first_name,
                        "last_name" =>  $value->last_name,
                        "email" => $value->email,
                        "phone" => !empty($value->phone) ? $value->phone : "no",
                        "accepts_marketing" => $value->accepts_marketing == true ? "yes" : "no",
                        "orders_count" => $value->orders_count,
                        "total_spent" => $value->total_spent,
                        "currency" => $value->currency,
                        "tax_exempt" => $value->tax_exempt == true ? "yes" : "no",
                        "created_at" => $value->created_at,

                    ]);
                }
            }
        }

        return $jsonData;
    }



    public function customers()
    {

        $data = $this->response->object();
        $jsonData = [];
        $count = 0;

        foreach ($data->customers as $value) {
            $count++;
            array_push($jsonData, [
                "id" => $value->id,
                "count" => $count,
                "last_order_id" => $value->last_order_id,
                "first_name" =>  $value->first_name,
                "last_name" =>  $value->last_name,
                "email" => $value->email,
                "phone" => !empty($value->phone) ? $value->phone : "no",
                "accepts_marketing" => $value->accepts_marketing == true ? "yes" : "no",
                "orders_count" => $value->orders_count,
                "total_spent" => $value->total_spent,
                "currency" => $value->currency,
                "tax_exempt" => $value->tax_exempt == true ? "yes" : "no",
                "created_at" => $value->created_at,
                "menu" => true,

            ]);
        }

        return $jsonData;
    }

    public function ordersItem()
    {

        $order = $this->response->object();

        $jsonData = [];
        $count = 0;

        foreach ($order as $value) {
            $count++;
            array_push($jsonData, [
                "count" => $count,
                "name" => $value->name,
                "total_weight" => $value->total_weight,
                "email" => $value->email,
                "phone" => $value->phone ? $value->phone : "no",
                "estimated_taxes" => $value->estimated_taxes != false ? $value->estimated_taxes : "no",
                "financial_status" => $value->financial_status,
                "current_total_price" => $value->current_total_price,
                "total_price_usd" => $value->total_price_usd,
                "currency" => $value->currency,
                "current_total_tax" => $value->current_total_tax,
                "total_discounts" => $value->total_discounts,
                "created_at" => $value->created_at
            ]);
        }

        return $jsonData;
    }

    public function orders()
    {
        $data = $this->response->object();

        $jsonData = [];
        $count = 0;

        foreach ($data->orders as $value) {
            $count++;
            array_push($jsonData, [
                "count" => $count,
                "name" => $value->name,
                "total_weight" => $value->total_weight,
                "email" => $value->email,
                "phone" => $value->phone ? $value->phone : "no",
                "estimated_taxes" => $value->estimated_taxes != false ? $value->estimated_taxes : "no",
                "financial_status" => $value->financial_status,
                "current_total_price" => $value->current_total_price,
                "total_price_usd" => $value->total_price_usd,
                "currency" => $value->currency,
                "current_total_tax" => $value->current_total_tax,
                "total_discounts" => $value->total_discounts,
                "created_at" => $value->created_at
            ]);
        }

        return $jsonData;
    }

    public function checkHttp($nameJson, $id)
    {
        if ($id == null) {
            $this->nameJson = $nameJson;
        } else {
            $this->nameJson = $nameJson . "/" . $id;
        }
    }
}
