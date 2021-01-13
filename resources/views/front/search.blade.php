@extends('front.layouts.master')

@section('title') Search : {{ $search_query }}@endsection

@section('main')
<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">

        {{-- {{ dd($res) }} --}}
        @if ($res)
        <div class="anime__details__review">
            <div class="section-title">
                <h5>RESULT for "{{ $search_query }}"</h5>
            </div>
            <div class="row">
                @foreach ($res['results'] as $p)
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="product__item">
                        <a href="{{ url('anime/details/' . $p['mal_id'] . '/' . str_slug($p['title'], '-')) }}" class="clearfix">
                            <div class="product__item__pic__small set-bg" data-setbg="{{ $p['image_url'] }}">
                                <div class="ep">{{ $p['type'] }}</div>
                                {{-- <div class="comment"><i class="fa fa-tv"></i> {{ $p['episodes'] }}</div>
                                <div class="view"><i class="fa fa-users"></i> {{ $p['members'] }}</div> --}}
                            </div>
                        </a>
                        <div class="mt-2">
                            <h6><a href="{{ url('anime/details/' . $p['mal_id'] . '/' . str_slug($p['title'], '-')) }}">{{ $p['title'] }}</a></h6>
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