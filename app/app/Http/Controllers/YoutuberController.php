<?php

namespace App\Http\Controllers;

use App\Models\Youtuber;
use App\Models\Genre;
use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YoutuberController extends Controller
{
    public function index()
    {
    }

    // Youtube動画検索（既存）
    public function selectExisting(Request $request) {

        $youtuber = new Youtuber();
        $select = $youtuber->getYoutuberData($request->url);

        if(empty($select)){
          return response()->json(new Youtuber);
        }
        $data = response()->json($select[0]);
        return $data;
    }

    // Youtube動画検索（質問結果）
    public function selectResult(Request $requestUrl) {

        $youtuber = new Youtuber();
        $selectRan = [];

        foreach($requestUrl->youtubeUrl as $url){
            $select = $youtuber->getYoutuberData($url);
            array_push($selectRan,$select[0]);
        }
        $data = response()->json($selectRan);
        return $data;

    }

    // Youtube動画登録時
    public function registration(Request $request) {
        
        $youtuber = new Youtuber();
        $youtuber->registrationYoutuber($request);

        $genre = new Genre();
        $genre->registrationGenre($request);

        $assessment = new Assessment();
        $assessment->registrationAssessment($request);

    }

    public function show(Youtuber $youtuber)
    {
        return $youtuber;
    }

}
