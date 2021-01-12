<?php

namespace App\Http\Controllers\Anime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->animeAPI = "https://api.jikan.moe/v3/";
    }

    public function home(){
        $topAPI = Http::get($this->animeAPI."top/anime/1/airing");
        $data['top_airing'] = array_slice($topAPI['top'], 0, 10, true);
        
        $todayAPI = Http::get($this->animeAPI. 'schedule/' . strtolower(date('l')));
        $data['today'] = array_slice($todayAPI[strtolower(date('l'))], 0, 6, true);

        $topAllAPI = Http::get($this->animeAPI."top/anime/1/tv");
        $data['top_alltime'] = array_slice($topAllAPI['top'], 0, 6, true);

        $topUpcomingAPI = Http::get($this->animeAPI."top/anime/1/upcoming");
        $data['top_upcoming'] = array_slice($topUpcomingAPI['top'], 0, 6, true);

        return view('front.home', $data);
    }

    public function detail($id, $slug){
        
        $data['detail'] = Http::get($this->animeAPI . "anime/" . $id);
        $data['detail_pictures'] = Http::get($this->animeAPI . "anime/" . $id . '/pictures');

        $detail_recommendation = Http::get($this->animeAPI . "anime/" . $id . '/recommendations');
        $data['detail_recommendation'] = array_slice($detail_recommendation['recommendations'], 0, 6, true);

        $topUpcomingAPI = Http::get($this->animeAPI."top/anime/1/upcoming");
        $data['top_upcoming'] = array_slice($topUpcomingAPI['top'], 0, 6, true);
        
        return view('front.anime-detail', $data);
    }
}
