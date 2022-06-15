<?php

namespace App\Http\Controllers\Admin\FcGraph;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facades\Fc;

class FcGraphController extends Controller
{
    public function index()
    {
        $ribbon = Fc::get("ribbon", "days_28");
        return view('admin.fcGraph.fcDashboard')->with([
            "ribbonData" => json_encode($ribbon)
        ]);
    }

    public function ctaClick()
    {
        $ctaClick = Fc::get("ctaClick", "days_28");

        return view('admin.fcGraph.cta.ctaShow')->with([
            'ctaData' =>  json_encode($ctaClick)
        ]);
    }


    public function ctaFilter(Request $request)
    {

        $ctaClick = Fc::get("ctaClick", $request->day);

        return response()->json([
            'ctaData' =>  $ctaClick
        ], 200);
    }

    public function pageEngagement()
    {
        $pageEngagement = Fc::get("pageEngagements", "days_28");

        return view('admin.fcGraph.pE.pageEngagementShow')->with([
            'peData' =>  json_encode($pageEngagement),
        ]);
    }

    public function pEFilter(Request $request)
    {

        $pageEngagement = Fc::get("pageEngagements", $request->day);

        return response()->json([
            'pEData' =>  $pageEngagement
        ], 200);
    }

    public function pageImpressions()
    {
        $pageImpressions = Fc::get("pageImpressions", "days_28");

        return view('admin.fcGraph.pI.pageImpressionsShow')->with([
            'pIData' =>  json_encode($pageImpressions),

        ]);
    }


    public function pIFilter(Request $request)
    {

        $pageImpressions = Fc::get("pageImpressions", $request->day);

        return response()->json([
            'pIData' =>  $pageImpressions
        ], 200);
    }

    public function pageReactions()
    {
        $fcReactions = Fc::get("pageReactions", "days_28");

        return view('admin.fcGraph.pageReactions.pageReactionsShow')->with([
            'fcReactionsData' =>  json_encode($fcReactions),
        ]);
    }

    public function reactionFilter(Request $request)
    {
        $fcReactions = Fc::get("pageReactions", $request->day);

        return response()->json([
            'reactionsData' => $fcReactions
        ], 200);
    }

    public function pageView()
    {

        $pageView = Fc::get("pageView", "days_28");

        $profileTabView = Fc::get("profileTabView", "days_28");

        return view('admin.fcGraph.pageView.pageViewShow')->with([
            'pageViewData' =>  json_encode($pageView),
            'profileTabViewData' =>  json_encode($profileTabView),
        ]);
    }

    public function pageViewFilter(Request $request)
    {

        $pageView = Fc::get("pageView", $request->day);

        return response()->json([
            'pageViewData' => $pageView
        ], 200);
    }

    public function profTabFilter(Request $request)
    {

        $profileTabView = Fc::get("profileTabView", $request->day);

        return response()->json([
            'profTabData' => $profileTabView
        ], 200);
    }

    public function pageVideoView()
    {
        $pageVideoView = Fc::get("pageVideoView", "days_28");

        $pageVideo30s = Fc::get("pageVideo30s", "days_28");

        return view('admin.fcGraph.pageVideoView.pageVideoViewShow')->with([
            'pageVideoViewData' =>  json_encode($pageVideoView),
            'pageVideo30sData' =>  json_encode($pageVideo30s),
        ]);
    }

    public function pageVideoViewFilter(Request $request)
    {
        $pageVideoView = Fc::get("pageVideoView", $request->day);

        return response()->json([
            'pageVideoViewData' => $pageVideoView
        ], 200);
    }

    public function pv30sFilter(Request $request){

        $pageVideo30s = Fc::get("pageVideo30s", $request->day);

        return response()->json([
            'pageVideo30sData' => $pageVideo30s
        ], 200);
    }

    public function storiesShow(){

        $fcstories = Fc::get("stories", "days_28");

        return view('admin.fcGraph.stories.storiesShow')->with([
            'storiesData' =>  json_encode($fcstories),
        ]);
    }

    public function storiesFilter(Request $request){
        $fcstories = Fc::get("stories", $request->day);

        return response()->json([
            'storiesData' => $fcstories
        ], 200);
    }

    public function demographicsShow(){

        $demographicsShow = Fc::get("demographics", "days_28");

        return view('admin.fcGraph.demographics.demographicsShow')->with([
            'demographicsData' =>  json_encode($demographicsShow),
        ]);
    }

    public function demographicsFilter(Request $request){

        $demographicsShow = Fc::get("demographics",$request->day);

        return response()->json([
            'demographicsData' => $demographicsShow
        ], 200);
    }
}
