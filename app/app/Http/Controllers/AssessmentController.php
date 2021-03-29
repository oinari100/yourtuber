<?php

namespace App\Http\Controllers;
use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index()
    {
    }

    // Youtube動画ランキング
    public function selectRanking()
    {
        $assessment = new Assessment();
        $selectRan = $assessment->getYoutuberRanking();

        $data = response()->json($selectRan);
        return $data;
    }

    // Youtube動画検索（質問結果）
    public function selectResult(Request $requestUrl) {

        $assessment = new Assessment();
        $selectRan = [];
    
        foreach($requestUrl->youtubeUrl as $url){
            $select = $assessment->getYoutuberData($url);
            array_push($selectRan,$select[0]);
        }
        $data = response()->json($selectRan);
        return $data;
    }

    // Youtube動画いいね数UP
    public function updateCount(Request $request) {
        var_dump($request);
        $assessment = new Assessment();
        $update = $assessment->updateYoutuberData($request);
    }

    public function show(Assessment $assessment)
    {
        return $assessment;
    }

}
