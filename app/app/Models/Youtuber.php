<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtuber extends Model
{
    use HasFactory;

    protected $table = 'youtuber';
    protected $fillable = ['url','youtuber','title'];

    public function getYoutuberData($url)
    {
        return Youtuber::where('url', $url)->get()->toArray();
    }
    
    public function registrationYoutuber($request)
    {
        $youtuber = new Youtuber();
        $youtuber->create([
            'url' => $request->url,
            'youtuber' => $request->name,
            'title' => $request->title,
        ]);

    }
}
