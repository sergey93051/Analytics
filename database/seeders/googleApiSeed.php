<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GoogleApi;

class googleApiSeed extends Seeder
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
              'view_id' => '',
              'service_account_credentials_json' => '',
              'shopify_domen' => 'zpellison.myshopify.com',

            ],
            [
                'view_id' => 255306798,
                'service_account_credentials_json' => 'app/google/newstorefriday.json',
                'shopify_domen' => 'newstorefriday.myshopify.com',

            ],
            [
                'view_id' => 256570323,
                'service_account_credentials_json' => 'app/google/test-store.json',
                'shopify_domen' => 'test-store-tigran.myshopify.com',

            ],
        ];

        GoogleApi::insert($data);
    }
}
