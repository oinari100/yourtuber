<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genre';
    protected $fillable = [
        'url',
        'adult',
        'cool',
        'crazy',
        'cute',
        'everyday',
        'love',
        'mysterious',
        'scared',
        'study',
        'surprise',
        'unwind',
        'youth',
    ];

    public function getRetrieve($genreContent)
    {
        $genreCount = count($genreContent);

        // 3件以上の配列をランダムに3件にする
        if ($genreCount >  config('const.GENRE.THREE_COUNT')) {
            shuffle($genreContent);
            $genreArray = array_slice($genreContent, config('const.GENRE.ZERO_COUNT') ,config('const.GENRE.THREE_COUNT')); 
          
        // 3件以下はそのまま代入
        } else if ($genreCount === config('const.GENRE.THREE_COUNT') || 
                     $genreCount === config('const.GENRE.TWO_COUNT') || 
                     $genreCount === config('const.GENRE.ONE_COUNT')) 
        {
            $genreArray = $genreContent;
        }

        $getResult = array();

        // 取得結果が3件以上とする
        for ($num = 0; count($getResult) < config('const.GENRE.THREE_COUNT'); $num++) {
            // 初回は全条件で実施
            if ($num === config('const.GENRE.ZERO_COUNT')) {
                $getResult = DB::select($this -> createSql($genreArray));
            // 初回移行は、項目を減らす
            } else {
                // 取得した結果をマージする
                $getResult = array_merge($getResult,DB::select($this -> createSql(array_slice($genreArray, count($genreArray)-1))));
            }
        }
        // 結果が3件以上の場合、ランダムに減らして返す
        if (count($getResult) > config('const.GENRE.THREE_COUNT') ){
            shuffle($getResult);
            return array_reverse(array_slice($getResult, config('const.GENRE.ZERO_COUNT') ,config('const.GENRE.THREE_COUNT'))); 
        } else {
            return array_reverse($getResult);
        }
    }

    public function createSql($genreArray) {
        $SQL = 'select * from genre where ';
        foreach ($genreArray as $genre) {
            if ($genreArray[0] === $genre) {
                $SQL .= $genre.' =1';
            } else {
                $SQL .= ' and '.$genre.' =1';
            }
        }
        return $SQL.';';
    }

    public function registrationGenre($request)
    {
        $genre = new Genre();
        $genreObject = $request->genre;
        $genreCount = count($request->genre);

        // ジャンル3つで登録
        if ($genreCount === config('const.GENRE.THREE_COUNT')) {
            $resultGenre = $genre->create([
                'url' => $request->url,
                $genreObject[config('const.GENRE.ZERO_COUNT')] => config('const.GENRE_FLG'),
                $genreObject[config('const.GENRE.ONE_COUNT')] => config('const.GENRE_FLG'),
                $genreObject[config('const.GENRE.TWO_COUNT')] => config('const.GENRE_FLG'),
            ]);
        // ジャンル2つで登録
        } else if ($genreCount === config('const.GENRE.TWO_COUNT')) {
            $resultGenre = $genre->create([
                'url' => $request->url,
                $genreObject[config('const.GENRE.ZERO_COUNT')] => config('const.GENRE_FLG'),
                $genreObject[config('const.GENRE.ONE_COUNT')] => config('const.GENRE_FLG'),
            ]);
        // ジャンル1つで登録
        } else if ($genreCount === config('const.GENRE.ONE_COUNT')) {
            $resultGenre = $genre->create([
                'url' => $request->url,
                $genreObject[config('const.GENRE.ZERO_COUNT')] => config('const.GENRE_FLG'),
            ]);
        }
    }

    public function getYoutuberRanking($request)
    {
        return Genre::where('url', $request[0])
                         ->orWhere('url', $request[1])
                           ->orWhere('url', $request[2])
                             ->orWhere('url', $request[3])
                               ->orWhere('url', $request[4])
                                 ->orWhere('url', $request[5])
                                   ->get()->toArray();
    }
}
