@extends('front.layouts.master')

@section('title')@endsection

@section('main')
<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">

        {{-- {{ dd($res) }} --}}
        @if ($anime)
        <div class="anime__details__review">
            <div class="section-title">
                <h5>{{ $ver }}</h5>
            </div>
            <div class="row">
                @php
                $params = "";

                if($ver == 'today'){
                    $params = strtolower(date('l'));
                }else{
                    $params = 'top';
                }
                @endphp

                @foreach ($anime[$params] as $p)
                <div class="col-6 col-lg-2 col-md-6 col-sm-6">
                    <div class="product__item">
                        <a href="{{ url('anime/details/' . $p['mal_id'] . '/' . str_slug($p['title'], '-')) }}"
                            class="clearfix">
                            <div class="product__item__pic set-bg" data-setbg="{{ $p['image_url'] }}">
                                @if ($ver == 'top')
                                <div class="ep">{{ $p['rank'] }}</div>
                                @else
                                <div class="ep">{{ $p['type'] }}</div>
                                @endif

                                <div class="view bg-success">{{ $p['score'] }}</div>
                            </div>
                        </a>
                        <div class="mt-2">
                            <h6><a
                                    href="{{ url('anime/details/' . $p['mal_id'] . '/' . str_slug($p['title'], '-')) }}">{{ $p['title'] }}</a>
                            </h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
<!-- Anime Section End -->
@endsection