@extends('front.layouts.master')

@section('title'){{ $detail['title'] }}@endsection

@section('main')
<!-- Breadcrumb Begin -->
{{-- <div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./categories.html">Categories</a>
                    <span>Romance</span>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg" data-setbg="{{ $detail['image_url'] }}">
                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                        <div class="view bg-danger"><i class="fa fa-heart"></i> {{ $detail['favorites'] }}</div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <h6 class="badge badge-info p-2 mb-2">{{ $detail['status'] }}</h6>
                        <div class="row">
                            <div class="anime__details__title col-md-10">
                                <h3>{{ $detail['title'] }}</h3>
                                <span>{{ $detail['title_japanese'] }}</span>
                            </div>
                            <div class="anime__details__rating col-md-2">
                                <div class="rating rounded bg-success">
                                    <h2 class="text-light text-center font-weight-bold">{{ $detail['score'] }}</h2>
                                </div>
                                <small class="text-center text-light">{{ number_format($detail['scored_by']) }}
                                    Votes</small>
                            </div>
                        </div>

                        <p class="synopsis">{{ $detail['synopsis'] }}</p>
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Type:</span> {{ $detail['type'] }}</li>
                                        <li><span>Studios:</span>
                                            @foreach($detail['studios'] as $studio)
                                            {{ $studio['name'] }}
                                            @endforeach
                                        </li>
                                        <li><span>Date aired:</span> {{ $detail['aired']['string'] }}</li>
                                        <li><span>Genre:</span>
                                            @foreach($detail['genres'] as $genre)
                                            {{ $genre['name'] }},
                                            @endforeach
                                        </li>
                                        <li><span>Duration:</span> {{ $detail['duration'] }}</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Rank:</span> {{ $detail['rank'] }}</li>
                                        <li><span>Rating:</span> {{ $detail['rating'] }}</li>
                                        <li><span>Source:</span> {{ $detail['source'] }}</li>
                                        <li><span>Members:</span> {{ $detail['members'] }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="anime__details__btn">
                            <a href="{{ url('anime/details/' . $detail['mal_id'] . '/' . str_slug($detail['title'], '-')) . '/character' }}"
                                class="follow-btn">Character</a>
                            @if ($detail['trailer_url'])
                            <button type="button" class="follow-btn border-0" data-toggle="modal"
                                data-target="#modalTrailer">
                                <i class="fa fa-tv"></i> Watch Trailer
                            </button>
                            @endif
                            {{-- <a href="#" class="watch-btn"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="blog__details__tags">
                    <div class="section-title">
                        <h5>Gallery</h5>
                    </div>
                    <div class="fotorama" data-width="100%" data-ratio="16/9" data-allowfullscreen="true"
                        data-nav="thumbs">
                        @foreach ($detail_pictures['pictures'] as $p)
                        <img src="{{ $p['large'] }}">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @if ($detail['related'])
                <div class="blog__details__tags">
                    <div class="section-title">
                        <h5>Related</h5>
                    </div>
                    @if (isset($detail['related']['Adaptation']))
                    <h6 class="text-light mb-3">Adaptation : </h6>
                    @foreach ($detail['related']['Adaptation'] as $adaptation)
                    <a
                        href="{{ url('anime/details/' . $adaptation['mal_id'] . '/' . str_slug($adaptation['name'], '-')) }}">{{ $adaptation['name'] }}
                        - {{ $adaptation['type'] }}</a>
                    @endforeach
                    @endif
                    @if (isset($detail['related']['Prequel']))
                    <h6 class="text-light mb-3">Prequel : </h6>
                    @foreach ($detail['related']['Prequel'] as $prequel)
                    <a href="{{ url('anime/details/' . $prequel['mal_id'] . '/' . str_slug($prequel['name'], '-')) }}">{{ $prequel['name'] }}
                        - {{ $prequel['type'] }}</a>
                    @endforeach
                    @endif
                    @if (isset($detail['related']['Other']))
                    <h6 class="text-light mb-3">Other : </h6>
                    @foreach ($detail['related']['Other'] as $other)
                    <a href="{{ url('anime/details/' . $other['mal_id'] . '/' . str_slug($other['name'], '-')) }}">{{ $other['name'] }}
                        - {{ $other['type'] }}</a>
                    @endforeach
                    @endif
                    @if (isset($detail['related']['Sequel']))
                    <h6 class="text-light mb-3">Sequel : </h6>
                    @foreach ($detail['related']['Sequel'] as $sequel)
                    <a href="{{ url('anime/details/' . $sequel['mal_id'] . '/' . str_slug($sequel['name'], '-')) }}">{{ $sequel['name'] }}
                        - {{ $sequel['type'] }}</a>
                    @endforeach
                    @endif
                    @if (isset($detail['related']['Summary']))
                    <h6 class="text-light mb-3">Summary : </h6>
                    @foreach ($detail['related']['Summary'] as $summary)
                    <a href="{{ url('anime/details/' . $summary['mal_id'] . '/' . str_slug($summary['name'], '-')) }}">{{ $summary['name'] }}
                        - {{ $summary['type'] }}</a>
                    @endforeach
                    @endif
                </div>
                @endif
            </div>
        </div>

        @if ($detail_recommendation)
        <div class="anime__details__review">
            <div class="section-title">
                <h5>RECOMMENDATION</h5>
            </div>
            <div class="row">
                @foreach ($detail_recommendation as $p)
                <div class="col-4 col-lg-2 col-md-6 col-sm-6">
                    <div class="product__item">
                        <a href="{{ url('anime/details/' . $p['mal_id'] . '/' . str_slug($p['title'], '-')) }}"
                            class="clearfix">
                            <div class="product__item__pic__small set-bg" data-setbg="{{ $p['image_url'] }}">
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

        {{-- <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="anime__details__review">
                    <div class="section-title">
                        <h5>Reviews</h5>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="img/anime/review-1.jpg" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Chris Curry - <span>1 Hour ago</span></h6>
                            <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                "demons" LOL</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="img/anime/review-2.jpg" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                            <p>Finally it came out ages ago</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="img/anime/review-3.jpg" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                            <p>Where is the episode 15 ? Slow update! Tch</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="img/anime/review-4.jpg" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Chris Curry - <span>1 Hour ago</span></h6>
                            <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                "demons" LOL</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="img/anime/review-5.jpg" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                            <p>Finally it came out ages ago</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="img/anime/review-6.jpg" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                            <p>Where is the episode 15 ? Slow update! Tch</p>
                        </div>
                    </div>
                </div>
                <div class="anime__details__form">
                    <div class="section-title">
                        <h5>Your Comment</h5>
                    </div>
                    <form action="#">
                        <textarea placeholder="Your Comment"></textarea>
                        <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="anime__details__sidebar">
                    <div class="section-title">
                        <h5>you might like...</h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-1.jpg">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">Boruto: Naruto next generations</a></h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-2.jpg">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-3.jpg">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-4.jpg">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>
<!-- Anime Section End -->



{{-- Modal Trailer --}}
<div class="modal fade" id="modalTrailer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ $detail['trailer_url'] }}" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    // $(document).ready(function () {
        //     $('#synopsis').readmore();
        // });
</script>
@endpush