<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\shopify\CostumersRequest;
use Illuminate\Http\Request;
use App\Facades\Shopify;
use App\Facades\Shopifyt;
use App\Facades\ShopifyEdit;
use App\Exports\CustomersExport;
use Maatwebsite\Excel\Facades\Excel;


class ShopifyController extends Controller
{

    public function shopifyOrderShow()
    {
        $ordersData = Shopify::getJson("orders");
        $ordersData = json_encode($ordersData);
        return view("admin.shopify.orders.shopifyOrder", compact("ordersData"));
    }

    public function shopifyOrderItemShow($order_id)
    {
        $orderData = Shopify::getJson("orders", $order_id);
        $orderData = json_encode($orderData);
        return view("admin.shopify.orders.shopifyOrderitem", compact("orderData"));
    }

    public function shopifyCustomerShow()
    {
        $customersData = Shopify::getJson("customers");
        $customersData = json_encode($customersData);
        return view("admin.shopify.customers.shopifyCustomers", compact("customersData"));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function customersExport(Request $request)
    {

        $customersData = Shopify::getJson("customers", null, 'forexport', $request->customerId);

        session()->put('customersData', $customersData);

        return response(200);
    }


    public function customersDownload()
    {

        $data = session()->get('customersData');

        return Excel::download(new CustomersExport($data), 'customers.csv');
    }

    function searchId($Ids, $array)
    {

        $tmp = [];

        foreach ($array as $value) {
            foreach ($Ids as  $id) {
                if ($value['id'] == $id) {
                    array_push($tmp, $value);
                }
            }
        }
        return $tmp;
    }

    public function shopifyCustomerItemShow($customer_id)
    {
        $customersItemData = Shopify::getJson("customers", $customer_id);
        $customersItemData = json_encode($customersItemData);
        return view("admin.shopify.customers.shopifyCustomersItem", compact("customersItemData"));
    }

    public function shopifyCustomerdelete($customer_id)
    {
        Shopifyt::deleteJson("customers", $customer_id);

        return redirect()->route("shopifyCustomerShow");
    }

    public function shopifyDraftsShow()
    {
        $draftsData = Shopify::getJson("draft_orders");
        $draftsData = json_encode($draftsData);
        return view("admin.shopify.shopifyDraft", compact('draftsData'));
    }

    public function shopifyProductsShow()
    {
        $productsData = Shopify::getJson("products");
        $productsData = json_encode($productsData);

        return view("admin.shopify.products.shopifyProducts", compact('productsData'));
    }

    public function shopifyProductDetalyShow($product_id)
    {

        $productData = Shopify::getJson("products", $product_id, "productItem");

        $productImages = json_encode($productData["productImages"]);
        $productSmall = json_encode($productData["productSmall"]);
        $productvariants = json_encode($productData["productvariants"]);
        $productoptions = json_encode($productData["productoptions"]);

        return view("admin.shopify.products.shopifyProductMore", compact('productvariants', 'productImages', 'productSmall', 'productoptions'));
    }

    public function checkoutsProduct($checkout_id)
    {
        $findProductId = Shopify::getJson("checkouts", null, $checkout_id, "products");

        $takeProduct = Shopify::getJson("products", null, $findProductId, "collects");

        session()->put("takeProduct", json_encode($takeProduct));

        return response(200);
    }

    public function checkoutsShippingAddressShow($checkout_id)
    {
        $takeShippingAddressData = Shopify::getJson("checkouts", null, $checkout_id, "ShippingAddress");
        $takeShippingAddressData = json_encode($takeShippingAddressData);
        return view("admin.shopify.checkouts.shopifyCheckoutsShipAddr", compact('takeShippingAddressData'));
    }


    public function shopifyProductsItemShow()
    {
        $takeProduct = '';

        if (session()->has("takeProduct")) {
            $takeProduct = session()->get("takeProduct");
        }

        return view("admin.shopify.products.shopifyProductsItem", compact('takeProduct'));
    }

    public function shopifyTenderTransactionShow()
    {
        $tenderTransactionData = Shopify::getJson("tender_transactions");
        $tenderTransactionData = json_encode($tenderTransactionData);

        return view("admin.shopify.tenderTransaction.shopifyTenderTransaction", compact('tenderTransactionData'));
    }

    public function shopifyCheckoutsShow()
    {
        $checkoutsData = Shopify::getJson("checkouts");
        $checkoutsData = json_encode($checkoutsData);
        return view("admin.shopify.checkouts.shopifyCheckouts", compact('checkoutsData'));
    }

    public function shopifyCustomerEditShow()
    {
        return view("admin.shopify.customers.shopifyEditCustomers")
            ->with([
                "customer" =>  json_decode(session()->get("customer"))
            ]);
    }

    public function shopifyCustomerEdit(Request $request)
    {

        session()->put('customer', json_encode($request->all()));

        return response(200);
    }

    public function shopifyCustomerUpdate(CostumersRequest $request)
    {

        $status = ShopifyEdit::putJson("customers", $request->customer_id, $request);

        if ($status == false) {
            return redirect()->back();
        } else {
            return redirect()->route("shopifyCustomerShow");
        }
    }
}
