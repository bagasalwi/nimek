<?php

namespace App\Http\Controllers\Anime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{
    public function __construct()
    {
        $this->animeAPI = "https://api.jikan.moe/v3/";
    }

    public function detail($id, $slug){
        $data['detail'] = Http::get($this->animeAPI . "character/" . $id);

        // dd($data);
        return view('front.character.character-detail', $data);
    }
}
