@extends('front.layouts.master')

@section('title'){{ $title }} Characters @endsection

@section('main')
<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        @if ($character)
        <div class="anime__details__review">
            <div class="section-title">
                <h5>CHARACTERS</h5>
            </div>
            <div class="row">
                @foreach ($character['characters'] as $p)
                <div class="col-4 col-lg-2 col-md-6 col-sm-6">
                    <div class="product__item">
                        <a href="{{ url('character/' . $p['mal_id'] . '/' . str_slug($p['name'], '-')) }}"
                            class="clearfix">
                            <div class="product__item__pic__small set-bg" data-setbg="{{ $p['image_url'] }}"></div>
                        </a>
                        <div class="mt-2">
                            <h6 class="text-light"><a
                                    href="{{ url('character/' . $p['mal_id'] . '/' . str_slug($p['name'], '-')) }}">{{ $p['name'] }}</a>
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