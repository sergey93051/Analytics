<?php

$protocol = 'https://';
$shopify_domen = env('SHOPIFY_DOMAIN',"");
$shopify_domen2 = env('SHOPIFY_DOMAIN2',"");
$shopify_domen3 = env('SHOPIFY_DOMAIN3',"");
$shopify_domen4 = env('SHOPIFY_DOMAIN4',"");


$shopifyEnv = [
    $shopify_domen => [
          "apikey" => env('APIkey',""),
          "shopify_domen" => $shopify_domen,
          "password" =>  env('Password',""),
          "apiversion" =>  env('APIversion',""),
          "protocol" =>$protocol,
      ],
      $shopify_domen2 => [
        "apikey" => env('APIkey2',""),
          "shopify_domen" =>$shopify_domen2,
          "password" =>  env('Password2',""),
          "apiversion" =>  env('APIversion2',""),
          "protocol" =>$protocol,
      ],
      $shopify_domen3 => [
        "apikey" => env('APIkey3',""),
          "shopify_domen" => $shopify_domen3,
          "password" =>  env('Password3',""),
          "apiversion" =>  env('APIversion3',""),
          "protocol" =>$protocol,
      ],
      $shopify_domen4 => [
        "apikey" => env('APIkey4',""),
          "shopify_domen" =>  $shopify_domen4,
          "password" =>  env('Password4',""),
          "apiversion" =>  env('APIversion4',""),
          "protocol" =>$protocol,
      ],
];



return json_encode($shopifyEnv);

