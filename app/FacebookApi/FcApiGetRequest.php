<?php

namespace App\FacebookApi;

use Exception;
use App\FacebookApi\FbConfig;

class  FcApiGetRequest extends FbConfig
{
    protected $fb;
    protected $url;
    protected $date;

    protected $accountid;
    protected $token;
    protected $getID;



    public function __construct($value, $date)
    {

        $this->fb = $this->fbApi();
        $this->value = $value;
        $this->date = $date;
        $this->getID = $this->getfcID();

        $this->accountid = $this->getID['accountid'];
        $this->token = (string)$this->getID['token'];
    }

    public  function  getData()
    {

        try {
            switch ($this->value) {
                case  "profile":
                    return  $this->profile();
                    break;
                case 'pageView':
                    return $this->pageView();
                    break;
                case  "ctaClick":
                    return  $this->ctaClick();
                    break;
                case "pageImpressions":
                    return $this->pageImpressions();
                    break;
                case 'pageEngagements':
                    return $this->pageEngagements();
                    break;
                case 'pageReactions':
                    return $this->pageReactions();
                    break;
                case 'profileTabView':
                    return $this->profileTabView();
                    break;
                case 'pageVideoView':
                    return $this->pageVideoView();
                    break;
                case 'pageVideo30s':
                    return $this->pageVideo30s();
                    break;
                case 'stories':
                    return $this->stories();
                    break;
                case 'demographics':
                    return $this->demographics();
                    break;
                case 'ribbon':
                    return  $this->ribbon();
                    break;
                default:
                    throw new Exception("empty data");
            }
        } catch (Exception $e) {
            return 'Message:' . $e->getMessage();
        }
    }

    public function anyData()
    {
        return  $this->fb->get("{$this->accountid}/{'/'}/{$this->date}", $this->token);
    }

    public function profile(): array
    {

        $urlProf = '/';

        $profile = [];

        $profdata = $this->fb->get("{$this->accountid}/{$urlProf}", $this->token);

        $imgdata = $this->fb->get("{$this->accountid}?fields=picture", $this->token);

        $profdata = $profdata->getGraphUser();
        $imgdata = $imgdata->getGraphUser();
        $imgdata = $imgdata->getPicture();

        array_push($profile, [
            "id" => $profdata->getId(),
            "name" => $profdata->getName(),
            'src' => $imgdata['url']
        ]);

        return $profile;
    }


    public function ribbon(): array
    {

        $ribbonData = [];

        $ribbon = $this->fb->get("{$this->accountid}/feed", $this->token);

        $ribbon = json_decode($ribbon->getBody());

        foreach ($ribbon->data as $key => $datas) {
            array_push($ribbonData, [

                "id" =>   $datas->id,
                'message' =>  $datas->message ?? null,
                'created_time' => $datas->created_time ?? null,

            ]);
        }
        return $ribbonData;
    }

    public function demographics(): array
    {
        $demographicsAnalytic = [];

        $page_fan_adds_unique = $this->fb->get("{$this->accountid}/insights/page_fan_adds_unique/{$this->date}", $this->token);
        $page_fan_removes_unique = $this->fb->get("{$this->accountid}/insights/page_fan_removes_unique/{$this->date}", $this->token);

        $page_fan_adds_unique = json_decode($page_fan_adds_unique->getBody());
        $page_fan_removes_unique = json_decode($page_fan_removes_unique->getBody());

        array_push($demographicsAnalytic, [
            'data' => [
                [
                    'name' => $page_fan_adds_unique->data[0]->name,
                    'title' => 'page fan adds unique',
                    "value" =>  $page_fan_adds_unique->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_fan_removes_unique->data[0]->name,
                    'title' => 'page fan removes unique',
                    "value" =>  $page_fan_removes_unique->data[0]->values[0]->value,
                ],
            ],
            'end_time' => strtr($page_fan_adds_unique->data[0]->values[0]->end_time, 'T', ' ')

        ]);

        return $demographicsAnalytic[0];
    }

    public function stories(): array
    {

        $storiesAnalytic = [];

        $page_content_activity_by_action_type_unique = $this->fb->get("{$this->accountid}/insights/page_content_activity_by_action_type_unique/{$this->date}", $this->token);
        $page_content_activity_by_action_type_unique = json_decode($page_content_activity_by_action_type_unique->getBody());

        $end_time = $page_content_activity_by_action_type_unique->data[0]->values[0]->end_time;

        $page_content_activity_by_action_type_unique = (array)$page_content_activity_by_action_type_unique->data[0]->values[0]->value;

        foreach ($page_content_activity_by_action_type_unique as $key => $value) {
            array_push($storiesAnalytic, [
                'data' => [
                    "name" => $key,
                    "value" => $value,
                ]
            ]);
        }
        array_push($storiesAnalytic, [
            'end_time' =>  strtr($end_time, "T", ' ')
        ]);

        return $storiesAnalytic;
    }

    public function pageVideo30s(): array
    {

        $pageVideo30sAnalytic = [];

        $page_video_complete_views_30s = $this->fb->get("{$this->accountid}/insights/page_video_complete_views_30s/{$this->date}", $this->token);
        $page_video_complete_views_30s_paid = $this->fb->get("{$this->accountid}/insights/page_video_complete_views_30s_paid/{$this->date}", $this->token);
        $page_video_complete_views_30s_organic = $this->fb->get("{$this->accountid}/insights/page_video_complete_views_30s_organic/{$this->date}", $this->token);
        $page_video_complete_views_30s_autoplayed = $this->fb->get("{$this->accountid}/insights/page_video_complete_views_30s_autoplayed/{$this->date}", $this->token);
        $page_video_complete_views_30s_click_to_play = $this->fb->get("{$this->accountid}/insights/page_video_complete_views_30s_click_to_play/{$this->date}", $this->token);
        $page_video_complete_views_30s_unique = $this->fb->get("{$this->accountid}/insights/page_video_complete_views_30s_unique/{$this->date}", $this->token);
        $page_video_complete_views_30s_repeat_views = $this->fb->get("{$this->accountid}/insights/page_video_complete_views_30s_repeat_views/{$this->date}", $this->token);


        $page_video_complete_views_30s = json_decode($page_video_complete_views_30s->getBody());
        $page_video_complete_views_30s_paid = json_decode($page_video_complete_views_30s_paid->getBody());
        $page_video_complete_views_30s_organic = json_decode($page_video_complete_views_30s_organic->getBody());
        $page_video_complete_views_30s_autoplayed = json_decode($page_video_complete_views_30s_autoplayed->getBody());
        $page_video_complete_views_30s_click_to_play = json_decode($page_video_complete_views_30s_click_to_play->getBody());
        $page_video_complete_views_30s_unique = json_decode($page_video_complete_views_30s_unique->getBody());
        $page_video_complete_views_30s_repeat_views = json_decode($page_video_complete_views_30s_repeat_views->getBody());

        array_push($pageVideo30sAnalytic, [
            'data' => [
                [
                    'name' => $page_video_complete_views_30s->data[0]->name,
                    'title' => 'page video complete views  30s',
                    "value" =>  $page_video_complete_views_30s->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_video_complete_views_30s_paid->data[0]->name,
                    'title' => 'page video complete views  30s paid',
                    "value" =>  $page_video_complete_views_30s_paid->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_video_complete_views_30s_organic->data[0]->name,
                    'title' => 'page video complete views  30s organic',
                    "value" =>  $page_video_complete_views_30s_organic->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_video_complete_views_30s_autoplayed->data[0]->name,
                    'title' => 'page video complete views  30s autoplayed',
                    "value" =>  $page_video_complete_views_30s_autoplayed->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_video_complete_views_30s_click_to_play->data[0]->name,
                    'title' => 'page video complete views  30s click to play',
                    "value" =>  $page_video_complete_views_30s_click_to_play->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_video_complete_views_30s_unique->data[0]->name,
                    'title' => 'page video complete views 30s unique',
                    "value" =>  $page_video_complete_views_30s_unique->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_video_complete_views_30s_repeat_views->data[0]->name,
                    'title' => 'page video complete views 30s repeat views',
                    "value" =>  $page_video_complete_views_30s_repeat_views->data[0]->values[0]->value,
                ],
            ],
            'end_time' => strtr($page_video_complete_views_30s->data[0]->values[0]->end_time, 'T', ' ')
        ]);


        return $pageVideo30sAnalytic[0];
    }


    public function pageVideoView(): array
    {

        $pageVideoViewAnalytic = [];

        $page_video_views = $this->fb->get("{$this->accountid}/insights/page_video_views/{$this->date}", $this->token);
        $page_video_views_paid = $this->fb->get("{$this->accountid}/insights/page_video_views_paid/{$this->date}", $this->token);
        $page_video_views_organic = $this->fb->get("{$this->accountid}/insights/page_video_views_organic/{$this->date}", $this->token);
        $page_video_views_autoplayed = $this->fb->get("{$this->accountid}/insights/page_video_views_autoplayed/{$this->date}", $this->token);
        $page_video_views_click_to_play = $this->fb->get("{$this->accountid}/insights/page_video_views_click_to_play/{$this->date}", $this->token);
        $page_video_views_unique = $this->fb->get("{$this->accountid}/insights/page_video_views_unique/{$this->date}", $this->token);
        $page_video_repeat_views = $this->fb->get("{$this->accountid}/insights/page_video_repeat_views/{$this->date}", $this->token);

        $page_video_views = json_decode($page_video_views->getBody());
        $page_video_views_paid = json_decode($page_video_views_paid->getBody());
        $page_video_views_organic = json_decode($page_video_views_organic->getBody());
        $page_video_views_autoplayed = json_decode($page_video_views_autoplayed->getBody());
        $page_video_views_click_to_play = json_decode($page_video_views_click_to_play->getBody());
        $page_video_views_unique = json_decode($page_video_views_unique->getBody());
        $page_video_repeat_views = json_decode($page_video_repeat_views->getBody());


        array_push($pageVideoViewAnalytic, [
            'data' => [
                [
                    'name' => $page_video_views->data[0]->name,
                    'title' => 'page video views',
                    "value" =>  $page_video_views->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_video_views_paid->data[0]->name,
                    'title' => 'page video views paid',
                    "value" =>  $page_video_views_paid->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_video_views_organic->data[0]->name,
                    'title' => 'page video views organic',
                    "value" =>  $page_video_views_organic->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_video_views_autoplayed->data[0]->name,
                    'title' => 'page video views autoplayed',
                    "value" =>  $page_video_views_autoplayed->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_video_views_click_to_play->data[0]->name,
                    'title' => 'page video views click to play',
                    "value" =>  $page_video_views_click_to_play->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_video_views_unique->data[0]->name,
                    'title' => 'page video views unique',
                    "value" =>  $page_video_views_unique->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_video_repeat_views->data[0]->name,
                    'title' => 'page video repeat views',
                    "value" =>  $page_video_repeat_views->data[0]->values[0]->value,
                ],
            ],
            'end_time' => strtr($page_video_views->data[0]->values[0]->end_time, 'T', ' ')
        ]);

        return  $pageVideoViewAnalytic[0];
    }


    public function profileTabView(): array
    {
        $profileTabViewAnalytic = [];
        $page_views_total = $this->fb->get("{$this->accountid}/insights/page_views_by_profile_tab_total/{$this->date}", $this->token);

        $page_views_total = json_decode($page_views_total->getBody());
        $end_time = $page_views_total->data[0]->values[0]->end_time;
        $page_views_total = (array)$page_views_total->data[0]->values[0]->value;

        foreach ($page_views_total as $key => $value) {
            array_push($profileTabViewAnalytic, [
                'data' => [
                    "name" => $key,
                    "value" => $value,
                ]
            ]);
        }
        array_push($profileTabViewAnalytic, [
            'end_time' =>  strtr($end_time, "T", ' ')
        ]);

        return $profileTabViewAnalytic;
    }

    public function pageView(): array
    {
        $pageViewAnalytic = [];
        $page_views_total = $this->fb->get("{$this->accountid}/insights/page_views_total/{$this->date}", $this->token);
        $page_views_logged_in_total = $this->fb->get("{$this->accountid}/insights/page_views_logged_in_total/{$this->date}", $this->token);
        $page_views_logged_in_unique = $this->fb->get("{$this->accountid}/insights/page_views_logged_in_unique/{$this->date}", $this->token);

        $page_views_total = json_decode($page_views_total->getBody());
        $page_views_logged_in_total = json_decode($page_views_logged_in_total->getBody());
        $page_views_logged_in_unique = json_decode($page_views_logged_in_unique->getBody());


        array_push($pageViewAnalytic, [
            'data' => [
                [
                    'name' => $page_views_total->data[0]->name,
                    'title' => 'page views total',
                    "value" =>  $page_views_total->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_views_logged_in_total->data[0]->name,
                    'title' => 'page views logged in total',
                    "value" =>  $page_views_logged_in_total->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_views_logged_in_unique->data[0]->name,
                    'title' => 'page views logged in unique',
                    "value" =>  $page_views_logged_in_unique->data[0]->values[0]->value,
                ],
            ],
            'end_time' => strtr($page_views_total->data[0]->values[0]->end_time, 'T', ' ')
        ]);

        return  $pageViewAnalytic[0];
    }

    public function pageReactions(): array
    {

        $reactionsAnalytic = [];

        $page_actions_post_reactions_total = $this->fb->get("{$this->accountid}/insights/page_actions_post_reactions_total/{$this->date}", $this->token);
        $page_actions_post_reactions_wow_total = $this->fb->get("{$this->accountid}/insights/page_actions_post_reactions_wow_total/{$this->date}", $this->token);


        $page_actions_post_reactions_total = json_decode($page_actions_post_reactions_total->getBody());
        $page_actions_post_reactions_wow_total = json_decode($page_actions_post_reactions_wow_total->getBody());

        array_push($reactionsAnalytic, [

            'data' => [
                [
                    'title' => 'like',
                    "value" =>  $page_actions_post_reactions_total->data[0]->values[0]->value->like ?? 0,
                ],
                [
                    'title' => 'love',
                    "value" =>  $page_actions_post_reactions_total->data[0]->values[0]->value->love ?? 0,
                ],
                [
                    'title' => 'wow',
                    "value" =>  $page_actions_post_reactions_wow_total->data[0]->values[0]->value ?? 0,
                ],
                [
                    'title' => 'haha',
                    "value" =>  $page_actions_post_reactions_total->data[0]->values[0]->value->haha ?? 0,
                ],
                [
                    'title' => 'sorry',
                    "value" =>  $page_actions_post_reactions_total->data[0]->values[0]->value->sorry ?? 0,
                ],
                [
                    'title' => 'anger',
                    "value" =>  $page_actions_post_reactions_total->data[0]->values[0]->value->anger ?? 0,
                ],
            ],
            'end_time' => strtr($page_actions_post_reactions_wow_total->data[0]->values[0]->end_time, 'T', ' ')

        ]);

        return $reactionsAnalytic[0];
    }

    public function pageImpressions(): array
    {

        $pIAnalytic = [];

        $page_impressions = $this->fb->get("{$this->accountid}/insights/page_impressions/{$this->date}", $this->token);
        $page_impressions_unique = $this->fb->get("{$this->accountid}/insights/page_impressions_unique/{$this->date}", $this->token);
        $page_impressions_paid = $this->fb->get("{$this->accountid}/insights/page_impressions_paid/{$this->date}", $this->token);
        $page_impressions_paid_unique = $this->fb->get("{$this->accountid}/insights/page_impressions_paid_unique/{$this->date}", $this->token);
        $page_impressions_organic = $this->fb->get("{$this->accountid}/insights/page_impressions_organic/{$this->date}", $this->token);
        $page_impressions_organic_unique = $this->fb->get("{$this->accountid}/insights/page_impressions_organic_unique/{$this->date}", $this->token);
        $page_impressions_viral = $this->fb->get("{$this->accountid}/insights/page_impressions_viral/{$this->date}", $this->token);
        $page_impressions_viral_unique = $this->fb->get("{$this->accountid}/insights/page_impressions_viral_unique/{$this->date}", $this->token);
        $page_impressions_by_story_type = $this->fb->get("{$this->accountid}/insights/page_impressions_by_story_type/{$this->date}", $this->token);
        $page_impressions_by_story_type_unique = $this->fb->get("{$this->accountid}/insights/page_impressions_by_story_type_unique/{$this->date}", $this->token);


        $page_impressions = json_decode($page_impressions->getBody());
        $page_impressions_unique = json_decode($page_impressions_unique->getBody());
        $page_impressions_paid = json_decode($page_impressions_paid->getBody());
        $page_impressions_paid_unique = json_decode($page_impressions_paid_unique->getBody());
        $page_impressions_organic = json_decode($page_impressions_organic->getBody());
        $page_impressions_organic_unique = json_decode($page_impressions_organic_unique->getBody());
        $page_impressions_viral = json_decode($page_impressions_viral->getBody());
        $page_impressions_viral_unique = json_decode($page_impressions_viral_unique->getBody());
        $page_impressions_by_story_type = json_decode($page_impressions_by_story_type->getBody());
        $page_impressions_by_story_type_unique = json_decode($page_impressions_by_story_type_unique->getBody());


        $page_impressions_by_story_type_value = (array)$page_impressions_by_story_type->data[0]->values[0]->value;
        $page_impressions_by_story_type_unique_value = (array)$page_impressions_by_story_type_unique->data[0]->values[0]->value;

        array_push($pIAnalytic, [
            'data' => [
                [
                    'name' => $page_impressions->data[0]->name,
                    'title' => 'page impressions',
                    "value" =>  $page_impressions->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_impressions_unique->data[0]->name,
                    'title' => 'page impressions unique',
                    "value" =>  $page_impressions_unique->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_impressions_paid->data[0]->name,
                    'title' => 'page impressions paid',
                    "value" =>  $page_impressions_paid->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_impressions_paid_unique->data[0]->name,
                    'title' => 'page impressions paid unique',
                    "value" =>  $page_impressions_paid_unique->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_impressions_organic->data[0]->name,
                    'title' => 'page impressions organic',
                    "value" =>  $page_impressions_organic->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_impressions_organic_unique->data[0]->name,
                    'title' => 'page impressions organic unique',
                    "value" =>  $page_impressions_organic_unique->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_impressions_viral->data[0]->name,
                    'title' => 'page impressions viral',
                    "value" =>  $page_impressions_viral->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_impressions_viral_unique->data[0]->name,
                    'title' => 'page impressions viral unique',
                    "value" =>  $page_impressions_viral_unique->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_impressions_by_story_type->data[0]->name,
                    'title' => 'page impressions by story type',
                    "value" =>  $page_impressions_by_story_type_value["page post"] ?? 0,
                ],
                [
                    'name' => $page_impressions_by_story_type_unique->data[0]->name,
                    'title' => 'page impressions by story type unique',
                    "value" =>  $page_impressions_by_story_type_unique_value["page post"] ?? 0,
                ],
            ],
            'end_time' => strtr($page_impressions->data[0]->values[0]->end_time, 'T', ' ')

        ]);

        return $pIAnalytic[0];
    }

    public function pageEngagements(): array
    {
        $pEAnalytic = [];

        $page_engaged_users = $this->fb->get("{$this->accountid}/insights/page_engaged_users/{$this->date}", $this->token);
        $page_post_engagements = $this->fb->get("{$this->accountid}/insights/page_post_engagements/{$this->date}", $this->token);
        $page_consumptions = $this->fb->get("{$this->accountid}/insights/page_consumptions/{$this->date}", $this->token);
        $page_consumptions_unique = $this->fb->get("{$this->accountid}/insights/page_consumptions_unique/{$this->date}", $this->token);
        $page_negative_feedback = $this->fb->get("{$this->accountid}/insights/page_negative_feedback/{$this->date}", $this->token);
        $page_negative_feedback_unique = $this->fb->get("{$this->accountid}/insights/page_negative_feedback_unique/{$this->date}", $this->token);
        $page_fan_adds_by_paid_non_paid_unique =  $this->fb->get("{$this->accountid}/insights/page_fan_adds_by_paid_non_paid_unique/day", $this->token);

        $page_engaged_users = json_decode($page_engaged_users->getBody());
        $page_post_engagements = json_decode($page_post_engagements->getBody());
        $page_consumptions = json_decode($page_consumptions->getBody());
        $page_consumptions_unique = json_decode($page_consumptions_unique->getBody());
        $page_negative_feedback = json_decode($page_negative_feedback->getBody());
        $page_negative_feedback_unique = json_decode($page_negative_feedback_unique->getBody());
        $page_fan_adds_by_paid_non_paid_unique = json_decode($page_fan_adds_by_paid_non_paid_unique->getBody());

        array_push($pEAnalytic, [
            'data' => [
                [
                    'name' => $page_engaged_users->data[0]->name,
                    'title' => 'page engaged users',
                    "value" =>  $page_engaged_users->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_post_engagements->data[0]->name,
                    'title' => 'page post engagements',
                    "value" =>  $page_post_engagements->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_consumptions->data[0]->name,
                    'title' => 'page consumptions',
                    "value" =>  $page_consumptions->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_consumptions_unique->data[0]->name,
                    'title' => 'page consumptions unique',
                    "value" =>  $page_consumptions_unique->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_negative_feedback->data[0]->name,
                    'title' => 'page negative feedback',
                    "value" =>  $page_negative_feedback->data[0]->values[0]->value,
                ],
                [
                    'name' => $page_negative_feedback_unique->data[0]->name,
                    'title' => 'page negative feedback unique',
                    "value" =>  $page_negative_feedback_unique->data[0]->values[0]->value,
                ],

            ],
            'pagePind' => [
                [
                    'name' => $page_fan_adds_by_paid_non_paid_unique->data[0]->name,
                    'title' => 'page fan adds by paid or non paid',
                    "total" =>  $page_fan_adds_by_paid_non_paid_unique->data[0]->values[0]->value->total,
                    "paid" =>  $page_fan_adds_by_paid_non_paid_unique->data[0]->values[0]->value->paid,
                    "unpaid" =>  $page_fan_adds_by_paid_non_paid_unique->data[0]->values[0]->value->unpaid,
                ],
            ],
            'end_time' => strtr($page_engaged_users->data[0]->values[0]->end_time, 'T', ' ')
        ]);

        return $pEAnalytic[0];
    }

    public function ctaClick(): array
    {

        $ctaAnalytic = [];
        $page_total_actions = $this->fb->get("{$this->accountid}/insights/page_total_actions/{$this->date}", $this->token);
        $get_direct_clicks_logged = $this->fb->get("{$this->accountid}/insights/page_get_directions_clicks_logged_in_unique/{$this->date}", $this->token);
        $website_clicks_logged = $this->fb->get("{$this->accountid}/insights/page_website_clicks_logged_in_unique/{$this->date}", $this->token);
        $phone_clicks_logged = $this->fb->get("{$this->accountid}/insights/page_call_phone_clicks_logged_in_unique/{$this->date}", $this->token);

        $page_total_actions = json_decode($page_total_actions->getBody());
        $get_direct_clicks_logged = json_decode($get_direct_clicks_logged->getBody());
        $website_clicks_logged = json_decode($website_clicks_logged->getBody());
        $phone_clicks_logged = json_decode($phone_clicks_logged->getBody());


        array_push($ctaAnalytic, [
            'data' => [
                [
                    'name' => $page_total_actions->data[0]->name,
                    'title' => 'page total actions',
                    "value" =>  $page_total_actions->data[0]->values[0]->value,
                ],
                [
                    'name' => $get_direct_clicks_logged->data[0]->name,
                    'title' => 'page get directions clicks for logged in users',
                    "value" =>  $get_direct_clicks_logged->data[0]->values[0]->value,
                ],
                [
                    'name' => $website_clicks_logged->data[0]->name,
                    'title' => 'page website clicks for logged in users',
                    "value" =>  $website_clicks_logged->data[0]->values[0]->value,
                ],
                [
                    'name' => $phone_clicks_logged->data[0]->name,
                    'title' => 'phone clicks for logged',
                    "value" =>  $phone_clicks_logged->data[0]->values[0]->value,
                ]
            ],
            'end_time' => strtr($page_total_actions->data[0]->values[0]->end_time, 'T', ' ')

        ]);

        return $ctaAnalytic[0];
    }
}
