<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

//shopify

Breadcrumbs::for('shopifyOrderShow', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Order',route('shopifyOrderShow'));
});

Breadcrumbs::for('shopifyCustomerShow', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Customer',route('shopifyCustomerShow'));
});

Breadcrumbs::for('shopifyDraftShow', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Draft',route('shopifyDraftShow'));
});

Breadcrumbs::for('shopifyProductsShow', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Products',route('shopifyProductsShow'));
});

Breadcrumbs::for('shopifyCollectionShow', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Collection',route('shopifyCollectionShow'));
});

Breadcrumbs::for('tenderTransactionShow', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Tender Transaction',route('tenderTransactionShow'));
});

Breadcrumbs::for('checkoutsShow', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Checkouts',route('checkoutsShow'));
});

//analytics

Breadcrumbs::for('userVisitsShow', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('User Visits',route('userVisitsShow'));
});

Breadcrumbs::for('countryShow', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Country and City',route('countryShow'));
});

Breadcrumbs::for('pageViewsShow', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Page Views',route('pageViewsShow'));
});

Breadcrumbs::for('cartCheckout', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Cart and Checkout',route('cartCheckout'));
});

Breadcrumbs::for('paymantshow', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Paymant',route('paymantshow'));
});

Breadcrumbs::for('customersSpentShow', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Customers and Spent',route('customersSpentShow'));
});
//
Breadcrumbs::for('profile.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('profile',route('profile.index'));
});

Breadcrumbs::for('orders.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Orders',route('orders.index'));
});

Breadcrumbs::for('customerlead.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Customerlead',route('customerlead.index'));
});

Breadcrumbs::for('usersDayindex', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('UsersDayindex',route('usersDayindex'));
});

Breadcrumbs::for('usersAov', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('UsersAov',route('usersAov'));
});

Breadcrumbs::for('overallAOV', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('OverallAOV',route('overallAOV'));
});

Breadcrumbs::for('newuser.retUser', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Newuser&RetUser',route('newuser.retUser'));
});

Breadcrumbs::for('usersAll', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('UsersAll',route('usersAll'));
});
Breadcrumbs::for('browserVisits', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Browser Statistics',route('browserVisits'));
});

Breadcrumbs::for('fcGraphShow', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('FB Dashboard',route('fcGraphShow'));
});

//2

Breadcrumbs::for('orderitem', function (BreadcrumbTrail $trail) {
    $trail->parent('shopifyCustomerShow');
    $trail->push('Order',route('orderitem',"id"));
});

Breadcrumbs::for('shopifyProductsItemShow', function (BreadcrumbTrail $trail) {
    $trail->parent('shopifyProductsShow');
    $trail->push('Product',route('shopifyProductsItemShow',"id"));
});

Breadcrumbs::for('shopifyProductDetalyShow', function (BreadcrumbTrail $trail) {
    $trail->parent('shopifyProductsShow');
    $trail->push('Product Detaly',route('shopifyProductDetalyShow',"id"));
});

//fb
Breadcrumbs::for('pageEngagement', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('page Engagement',route('pageEngagement'));
});

Breadcrumbs::for('PageImpressions', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Page Impressions',route('PageImpressions'));
});

Breadcrumbs::for('pageReactions', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Page Reactions',route('pageReactions'));
});

Breadcrumbs::for('pageView', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('page View',route('pageView'));
});

Breadcrumbs::for('pageVideoView', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('page Video View',route('pageVideoView'));
});

Breadcrumbs::for('ctaClick', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('cta Click',route('ctaClick'));
});

Breadcrumbs::for('demographics', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('demographics',route('demographics'));
});

Breadcrumbs::for('stories', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('stories',route('stories'));
});
