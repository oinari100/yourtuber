<?php

namespace App\Http\Controllers;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
    }

    // Youtube動画検索（質問結果）
    public function selectResult(Request $request) {
        $genre = new Genre();
        $select = $genre->getRetrieve($request->conditions);
        $data = response()->json($select);
        return $data;
    }

    // Youtube動画ランキング
    public function selectRanking(Request $request)
    {
        $genre = new Genre();
        $selectRan = $genre->getYoutuberRanking($request);

        $data = response()->json($selectRan);
        return $data;
    }

    public function show(Genre $genre)
    {
        return $genre;
    }

}
