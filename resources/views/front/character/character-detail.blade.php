@extends('front.layouts.master')

@section('title'){{ $detail['name'] }}@endsection

@section('main')
<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg" data-setbg="{{ $detail['image_url'] }}">
                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                        <div class="view bg-danger"><i class="fa fa-heart"></i> {{ $detail['member_favorites'] }}</div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="row">
                            <div class="anime__details__title col-md-10">
                                <h3>{{ $detail['name'] }}</h3>
                                <span>{{ $detail['name_kanji'] }}</span>
                            </div>
                        </div>

                        <p class="synopsis">{!! str_replace(array('\r\n', '\n\r', '\n', '\r'), '<br>', $detail['about'])
                            !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="anime__details__review">
            <div class="section-title">
                <h5>Voice Actor's</h5>
            </div>
            <div class="row">
                @foreach ($detail['voice_actors'] as $p)
                <div class="col-4 col-lg-2 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic__small set-bg" data-setbg="{{ $p['image_url'] }}">
                            <div class="ep">{{ $p['language'] }}</div>
                        </div>
                        <div class="mt-2">
                            <h6 class="text-light"><a>{{ $p['name'] }}</a></h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="anime__details__review">
            <div class="section-title">
                <h5>ANIMEOGRAPHY</h5>
            </div>
            <div class="row">
                @foreach ($detail['animeography'] as $p)
                <div class="col-4 col-lg-2 col-md-6 col-sm-6">
                    <div class="product__item">
                        <a href="{{ url('anime/details/' . $p['mal_id'] . '/' . str_slug($p['name'], '-')) }}"
                            class="clearfix">
                            <div class="product__item__pic__small set-bg" data-setbg="{{ $p['image_url'] }}">
                            </div>
                        </a>
                        <div class="mt-2">
                            <h6 class="text-light"><a
                                    href="{{ url('anime/details/' . $p['mal_id'] . '/' . str_slug($p['name'], '-')) }}">{{ $p['name'] }}</a>
                            </h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="anime__details__review">
            <div class="section-title">
                <h5>MANGAOGRAPHY</h5>
            </div>
            <div class="row">
                @foreach ($detail['mangaography'] as $p)
                <div class="col-4 col-lg-2 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic__small set-bg" data-setbg="{{ $p['image_url'] }}">
                        </div>
                        <div class="mt-2">
                            <h6 class="text-light"><a>{{ $p['name'] }}</a></h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
<!-- Anime Section End -->
@endsection