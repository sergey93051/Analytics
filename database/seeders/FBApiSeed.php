<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FbApi;

class FBApiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        FbApi::create([
            "FCAPP_ID" => '298043502338137',
            'FCAPP_SECRET' => 'c7189ce424781cba78f56e0cf908e4ed',
            "FCGRAPH_VERSION" => 'v12.0',
            "FCACCAUNT" => '100869649148470',
            "FCToken" => 'EAAEPEakVoFkBAOZBa7ksd2oGszA2F2FZB943JBSLMcuZCgbKqkZAg5mchZCPlTbAzQd6aZBDrolz9ttZAZBIsVaDQg8naWXsEfAm6MdbvFbqt81ZBbOiKFuGgVfmb9yom3PcmFuKDVpa59B2DWoRVszVziIs2w6oaP1iMh5fLHKKsj5ZCTNKGHl6FDinaihsFQL2QZD'
        ]);
    }
}
