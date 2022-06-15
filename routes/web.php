<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\CustomerLeadController;
use App\Http\Controllers\Admin\ShopifyController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\Shopify\ProductController;
use App\Http\Controllers\Admin\Shopify\CollectionController;
use App\Http\Controllers\Admin\Shopify\GoogleAnalytics\UsersVisitsController;
use App\Http\Controllers\Admin\Shopify\GoogleAnalytics\PageViewsController;
use App\Http\Controllers\Admin\Shopify\GoogleAnalytics\CartChekoutsController;
use App\Http\Controllers\Admin\Shopify\GoogleAnalytics\PaymantController;
use App\Http\Controllers\Admin\Shopify\GoogleAnalytics\CustomersSpentController;
use App\Http\Controllers\Admin\Shopify\GoogleAnalytics\CountryController;
use App\Http\Controllers\Admin\Shopify\Api\ApiChooseController;
use App\Http\Controllers\Admin\Shopify\GoogleAnalytics\BrowserController;
use App\Http\Controllers\Admin\Shopify\MailChimp\MailChimpController;
use App\Http\Controllers\Admin\FcGraph\FcGraphController;
use App\Http\Controllers\Admin\FcGraph\Api\FBApiChooseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::prefix('login/facebook')->group(function () {

    Route::get('/', [FacebookController::class, 'facebookRedirect'])->name("fcLogin");

    Route::get('/callback', [FacebookController::class, 'loginWithFacebook']);
});

Route::prefix('login/google')->group(function () {

    Route::get('/', [GoogleController::class, 'googleRedirect'])->name("googleLogin");

    Route::get('/callback', [GoogleController::class, 'loginWithgoogle']);
});

Route::prefix('private/admin')->group(function () {

    Route::middleware(['guest'])->group(function () {

        Route::get("/login", [AuthController::class, "login"])->name("login");

        Route::post("/login", [AuthController::class, "customLogin"])->name("customLogin");

        Route::get("/register", [AuthController::class, "register"])->name("register");

        Route::post("/register", [AuthController::class, "customRegister"])->name("customRegister");
    });

    Route::middleware(['auth'])->group(function () {

        Route::get("/", [AdminController::class, "index"])->name("home");

        // Route::get("usersAov", [AdminController::class, "usersAovShow"])->name("usersAov");
        // Route::get("usersDayindex", [AdminController::class, "usersDayindexShow"])->name("usersDayindex");
        // Route::get("revenue", [AdminController::class, "revenueShow"])->name("revenue");
        // Route::get("OverallAOVBySource", [AdminController::class, "overallAOVShow"])->name("overallAOV");
        // Route::get("newUsersReturningUsers", [AdminController::class, "newuser_retUser"])->name("newuser.retUser");
        // Route::get("users", [AdminController::class, "usersAll"])->name("usersAll");

        Route::resource("profile", ProfileController::class);
        Route::resource("orders", OrderController::class);
        Route::resource("customerlead", CustomerLeadController::class);

        Route::prefix('/')->group(function () {

            Route::prefix('fb')->group(function(){

                    Route::post('/choosefbApi',[FBApiChooseController::class,'fbApi'])->name("fbApi");

                    Route::get('/graph',[FcGraphController::class,'index'])->name("fcGraphShow");

                    Route::get('/ctaClick',[FcGraphController::class,'ctaClick'])->name("ctaClick");

                    Route::post('/ctaRequest',[FcGraphController::class,'ctaFilter']);

                    Route::get('/pageEngagement',[FcGraphController::class,'pageEngagement'])->name("pageEngagement");
                    Route::post('/peRequest',[FcGraphController::class,'pEFilter']);

                    Route::get('/pageImpressions',[FcGraphController::class,'PageImpressions'])->name('PageImpressions');
                    Route::post('/piRequest',[FcGraphController::class,'pIFilter']);

                    Route::get('/pageReactions',[FcGraphController::class,'pageReactions'])->name('pageReactions');
                    Route::post('/reactionRequest',[FcGraphController::class,'reactionFilter']);

                    Route::get('/pageView',[FcGraphController::class,'pageView'])->name('pageView');
                    Route::post('/pageViewRequest',[FcGraphController::class,'pageViewFilter']);

                    Route::post('/profTabRequest',[FcGraphController::class,'profTabFilter']);

                    Route::get('/pageVideoView',[FcGraphController::class,'pageVideoView'])->name('pageVideoView');

                    Route::post('/pvvRequest',[FcGraphController::class,'pageVideoViewFilter']);

                    Route::post('/pv30sRequest',[FcGraphController::class,'pv30sFilter']);

                    Route::get('/stories',[FcGraphController::class,'storiesShow'])->name('stories');

                    Route::post('/storiesRequest',[FcGraphController::class,'storiesFilter']);

                    Route::get('/demographics',[FcGraphController::class,'demographicsShow'])->name('demographics');

                    Route::post('/demographicsRequest',[FcGraphController::class,'demographicsFilter'])->name('demographicsFilter');

            });
            //shopify
            Route::prefix("analytics")->group(function () {

                Route::get("userVisits", [UsersVisitsController::class, "userVisitsShow"])->name("userVisitsShow");

                Route::any("userVisitsTable", [UsersVisitsController::class, "userVisitsTable"])->name("userVisitsTable");
                Route::post("userChannelRequest", [UsersVisitsController::class, "userChannelFilterData"])->name("userChannelRequest");

                Route::post("dayVisitsRequest", [UsersVisitsController::class, "userVisitsFilterdata"])->name("dayVisits");

                Route::get("pageViews", [PageViewsController::class, "pageViewsShow"])->name("pageViewsShow");
                Route::post("pscRequest", [PageViewsController::class, "pscFilterData"])->name("pageViewsRequest");

                Route::get("browserStatistics", [BrowserController::class, "browserVisits"])->name("browserVisits");
                Route::post("browserRequest", [BrowserController::class, "browserFilterdata"])->name("browserRequest");

                Route::get("anyPageViewsTable", [PageViewsController::class, "anyPageViewsTableShow"])->name("anyPageViewsTable");

                Route::post("anypageViewsRequest", [PageViewsController::class, "anypageFilterdata"])->name("anypageViewsRequest");
                Route::post("anypagetableFilterRequest", [PageViewsController::class, "anyPageTableFilter"])->name("anypagetableFilter");

                Route::get("cartCheckout", [CartChekoutsController::class, "cartCheckoutshow"])->name("cartCheckout");
                Route::post("checkoutRequest", [CartChekoutsController::class, "checkoutFilterData"])->name("checkoutRequest");
                Route::post("cartRequest", [CartChekoutsController::class, "cartFilterData"])->name("cartRequest");

                Route::get("paymant", [PaymantController::class, "paymantShow"])->name("paymantshow");
                Route::post("paymantCountRequest", [PaymantController::class, "paymantCountFilterdata"])->name("paymantCount");
                Route::post("paymentDetailsRequest", [PaymantController::class, "paymentDetailsAnalyticsdata"])->name("paymentDetails");

                Route::get("customers&totalSpent", [CustomersSpentController::class, "CustomersSpentShow"])->name("customersSpentShow");

                Route::post("countryRequest", [CountryController::class, "countryFilterData"])->name("countryFilterData");
                Route::post("cityRequest", [CountryController::class, "cityFilterData"])->name("cityFilterData");

                Route::get("country&city", [CountryController::class, "countryShow"])->name("countryShow");
            });

            Route::post("shopify/chooseApi", [ApiChooseController::class, "shopifyApi"])->name("chooseApi");

            Route::get("header/edit", [ProductController::class, "headerEditShow"])->name("headerEditShow");

            Route::Post("header/edit/req", [ProductController::class, "headerEdit"])->name("headerEdit");

            Route::Post("header/edit/update", [ProductController::class, "headerUpdate"])->name("headerUpdate");

            Route::get("products", [ShopifyController::class, "shopifyProductsShow"])->name("shopifyProductsShow");
            Route::get("product/detaly/{id}", [ShopifyController::class, "shopifyProductDetalyShow"])->name("shopifyProductDetalyShow");
            Route::get("products/edit", [ProductController::class, "productEdit"])->name("ProductEdit");

            Route::get("productsall/delete/{id}", [ProductController::class, "productDelete"])->name("productDelete");

            Route::post("products/delete/req", [ProductController::class, "productVariantsDelete"])->name("productVariantsDelete");

            Route::post("image/delete/req", [ProductController::class, "imageDelete"])->name("imageDelete");

            Route::get("image/add/{id}", [ProductController::class, "imageAdd"])->name("imageAdd");
            Route::post("image/add/req", [ProductController::class, "imagecreate"])->name("imagecreate");

            Route::get("variant/add/{id}", [ProductController::class, "variantAddShow"])->name("variantAddShow");
            Route::post("variant/add/req", [ProductController::class, "variantAdd"])->name("variantAdd");

            Route::post("variant/edit/req", [ProductController::class, "variantEdit"])->name("variantEdit");
            Route::get("variant/edit", [ProductController::class, "variantEditShow"])->name("variantEditShow");
            Route::post("variant/update", [ProductController::class, "variantupdate"])->name("variantupdate");

            Route::get("order", [ShopifyController::class, "shopifyOrderShow"])->name("shopifyOrderShow");
            Route::get("orders/item/{id}", [ShopifyController::class, "shopifyOrderItemShow"])->name("orderitem");
            Route::get("customers", [ShopifyController::class, "shopifyCustomerShow"])->name("shopifyCustomerShow");

            Route::post('customers/export', [ShopifyController::class, 'customersExport'])->name('customersExport');
            Route::get('customers/export', [ShopifyController::class, 'customersDownload'])->name('customersDownload');

            Route::get("customers/item/{id}", [ShopifyController::class, "shopifyCustomerItemShow"])->name("shopifyCustomerItemShow");
            Route::get("customers/delete/{id}", [ShopifyController::class, "shopifyCustomerdelete"])->name("shopifyCustomerdelete");

            Route::get("customer/editcustomer", [ShopifyController::class, "shopifyCustomerEditShow"])->name("shopifyCustomerEditShow");
            Route::post("customer/editcustomer/req", [ShopifyController::class, "shopifyCustomerEdit"])->name("shopifyCustomerEdit");
            Route::post("customer/update", [ShopifyController::class, "shopifyCustomerUpdate"])->name("customerUpdate");

            Route::get("drafts", [ShopifyController::class, "shopifyDraftsShow"])->name("shopifyDraftShow");

            Route::get("collection", [CollectionController::class, "shopifyCollectionShow"])->name("shopifyCollectionShow");
            Route::get("collection/products/{id}", [CollectionController::class, "collectionProducts"])->name("collectionProducts");
            Route::get("collection/addProducts/{id}", [CollectionController::class, "collectionaddProductsShow"])->name("collectionaddProductsShow");

            Route::get("collection/createcollection", [CollectionController::class, "collectionCreateShow"])->name("collectionCreateShow");
            Route::post("collection/createcollection", [CollectionController::class, "collectionCreate"])->name("collectionCreate");

            Route::get("collection/editcollection", [CollectionController::class, "collectionEditShow"])->name("collectionEditShow");
            Route::post("collection/editcollection/req", [CollectionController::class, "collectionEdit"])->name("collectionEdit");
            Route::post("collection/updatecollection", [CollectionController::class, "collectionUpdate"])->name("collectionUpdate");
            Route::get("collection/deletecollection/{id}", [CollectionController::class, "collectionDelete"])->name("collectionDelete");

            Route::post("collection/addProducts/req", [CollectionController::class, "collectionaddProducts"])->name("collectionaddProducts");

            Route::get("tenderTransaction", [ShopifyController::class, "shopifyTenderTransactionShow"])->name("tenderTransactionShow");
            Route::get("checkouts", [ShopifyController::class, "shopifyCheckoutsShow"])->name("checkoutsShow");
            Route::get("checkouts/products/{id}", [ShopifyController::class, "checkoutsProduct"])->name("checkoutsProduct");
            Route::get("checkouts/ShippingAddress/{id}", [ShopifyController::class, "checkoutsShippingAddressShow"])->name("checkoutsShippingAddressShow");
            Route::get("products/item/{id}", [ShopifyController::class, "shopifyProductsItemShow"])->name("shopifyProductsItemShow");
        });

        Route::get("logout", [AuthController::class, "logout"])->name("logout");
    });
});
