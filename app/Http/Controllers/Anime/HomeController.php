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

    public function home()
    {
        $topAPI = Http::get($this->animeAPI . "top/anime/1/airing");
        $data['top_airing'] = array_slice($topAPI['top'], 0, 10, true);

        $todayAPI = Http::get($this->animeAPI . 'schedule/' . strtolower(date('l')));
        $data['today'] = array_slice($todayAPI[strtolower(date('l'))], 0, 8, true);

        $topAllAPI = Http::get($this->animeAPI . "top/anime/1/tv");
        $data['top_alltime'] = array_slice($topAllAPI['top'], 0, 8, true);

        $topUpcomingAPI = Http::get($this->animeAPI . "top/anime/1/upcoming");
        $data['top_upcoming'] = array_slice($topUpcomingAPI['top'], 0, 8, true);

        return view('front.home', $data);
    }

    public function search(Request $request)
    {
        if ($request->has('search')) {
            $data['res'] = Http::get($this->animeAPI . "search/anime", [
                "q" => $request->search,
                "limit" => 45,
                // "genre" => $request->search,
                // "type" => $request->search,
            ]);

            $data['search_query'] = $request->search;

            return view('front.search', $data);
        }
    }

    public function detail($id)
    {

        $data['detail'] = Http::get($this->animeAPI . "anime/" . $id);
        $data['detail_pictures'] = Http::get($this->animeAPI . "anime/" . $id . '/pictures');

        $detail_recommendation = Http::get($this->animeAPI . "anime/" . $id . '/recommendations');
        $data['detail_recommendation'] = array_slice($detail_recommendation['recommendations'], 0, 6, true);

        $topUpcomingAPI = Http::get($this->animeAPI . "top/anime/1/upcoming");
        $data['top_upcoming'] = array_slice($topUpcomingAPI['top'], 0, 6, true);

        return view('front.anime-detail', $data);
    }

    public function detail_character($id, $slug)
    {
        $data['character'] = Http::get($this->animeAPI . "anime/" . $id . '/characters_staff');
        $data['title'] = $slug;

        return view('front.anime-detail-character', $data);
    }

    public function trending()
    {
        $data['anime'] = Http::get($this->animeAPI . "top/anime/1/airing");
        $data['ver'] = 'trending';

        return view('front.browse', $data);
    }
    
    public function today()
    {
        $data['anime'] = Http::get($this->animeAPI . 'schedule/' . strtolower(date('l')));
        $data['ver'] = 'today';

        return view('front.browse', $data);
    }
    
    public function top()
    {
        $data['anime'] = Http::get($this->animeAPI . "top/anime/1/tv");
        $data['ver'] = 'top';

        return view('front.browse', $data);
    }

    public function upcoming()
    {
        $data['anime'] = Http::get($this->animeAPI . "top/anime/1/upcoming");
        $data['ver'] = 'upcoming';

        return view('front.browse', $data);
    }
}
