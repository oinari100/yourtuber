<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Assessment extends Model
{
    use HasFactory;

    protected $table = 'assessment';
    protected $fillable = [
        'url',
        'nice',
    ];

    public function getYoutuberData($url)
    {
        return Assessment::where('url', $url)->get()->toArray();
    }

    public function registrationAssessment($request)
    {
        $assessment = new Assessment();
        $resultAssessment = $assessment->create([
            'url' => $request->url,
            'nice' => config('const.NICE_COUNT_DEFAULT'),
        ]);   
    }

    public function getYoutuberRanking()
    {
        $SQL = 'select * from assessment order by nice desc limit 6;';
        return DB::select($SQL);
    }

    public function updateYoutuberData($request)
    {
        Assessment::where('url', $request->url)
                  ->update(['nice' => $request->count]);   
    }
}
