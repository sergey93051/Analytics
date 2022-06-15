<?php

namespace Database\Seeders;
use App\Models\ShopifyApi;

use Illuminate\Database\Seeder;

class shopifyApiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $data = [
            [
                "APIkey" => '79653343ad31b561c6424fe37f0590c3',
                "SHOPIFY_DOMAIN" =>'zpellison.myshopify.com',
                "Password" =>'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',
                "APIversion" => '2021-10',
                "protocol" =>'https://',

            ],
             [
                "APIkey" => '614b7b61e53dfe16f78bd128f2fd3cc9',
                "SHOPIFY_DOMAIN" =>'newstorefriday.myshopify.com',
                "Password" =>'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',
                "APIversion" => '2021-10',
                "protocol" =>'https://',

            ],[

                "APIkey" => '5bb9a0a69445a65431f4d94bd87fdfd2',
                "SHOPIFY_DOMAIN" =>'test-store-tigran.myshopify.com',
                "Password" =>'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',
                "APIversion" => '2021-10',
                "protocol" =>'https://',

            ]
        ];

        ShopifyApi::insert($data);

    }

}
