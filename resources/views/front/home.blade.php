@extends('front.layouts.master')

@section('title')Home @endsection

@section('main')
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Today's Trending</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="{{ route('anime.today') }}" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- {{ dd($today[strtolower(date('l'))][0]) }} --}}
                        @foreach ($today as $p)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="{{ url('anime/details/' . $p['mal_id'] . '/' . str_slug($p['title'], '-')) }}" class="clearfix">
                                    <div class="product__item__pic set-bg" data-setbg="{{ $p['image_url'] }}">
                                        <div class="ep">{{ $p['type'] }}</div>
                                        <div class="comment"><i class="fa fa-tv"></i> {{ $p['episodes'] }}</div>
                                        <div class="view"><i class="fa fa-users"></i> {{ $p['members'] }}</div>
                                    </div>
                                </a>
                                <div class="product__item__text">
                                    <ul>
                                        @foreach ($p['genres'] as $genre)
                                        <li>{{ $genre['name'] }}</li>
                                        @endforeach
                                    </ul>
                                    <h6><a href="{{ url('anime/details/' . $p['mal_id'] . '/' . str_slug($p['title'], '-')) }}">{{ $p['title'] }}</a></h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="popular__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Top Score All Time</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="{{ route('anime.top') }}" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($top_alltime as $p)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="{{ url('anime/details/' . $p['mal_id'] . '/' . str_slug($p['title'], '-')) }}" class="clearfix">
                                    <div class="product__item__pic set-bg" data-setbg="{{ $p['image_url'] }}">
                                        <div class="ep"> Rank {{ $p['rank'] }}</div>
                                        <div class="view bg-success">{{ $p['score'] }}</div>
                                    </div>
                                </a>
                                <div class="product__item__text">
                                    <h5><a href="{{ url('anime/details/' . $p['mal_id'] . '/' . str_slug($p['title'], '-')) }}">{{ $p['title'] }}</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="recent__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Top Upcoming</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="{{ route('anime.upcoming') }}" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($top_upcoming as $p)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="{{ url('anime/details/' . $p['mal_id'] . '/' . str_slug($p['title'], '-')) }}" class="clearfix">
                                    <div class="product__item__pic set-bg" data-setbg="{{ $p['image_url'] }}">
                                        <div class="ep">{{ $p['type'] }}</div>
                                        <div class="comment"><i class="fa fa-tv"></i> {{ $p['episodes'] }}</div>
                                        <div class="view"><i class="fa fa-users"></i> {{ $p['members'] }}</div>
                                    </div>
                                </a>
                                <div class="product__item__text">
                                    <h5><a href="{{ url('anime/details/' . $p['mal_id'] . '/' . str_slug($p['title'], '-')) }}">{{ $p['title'] }}</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{-- <div class="live__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Live Action</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/live/live-1.jpg">
                                    <div class="ep">18 / 18</div>
                                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                </div>
                                <div class="product__item__text">
                                    <ul>
                                        <li>Active</li>
                                        <li>Movie</li>
                                    </ul>
                                    <h5><a href="#">Shouwa Genroku Rakugo Shinjuu</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/live/live-2.jpg">
                                    <div class="ep">18 / 18</div>
                                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                </div>
                                <div class="product__item__text">
                                    <ul>
                                        <li>Active</li>
                                        <li>Movie</li>
                                    </ul>
                                    <h5><a href="#">Mushishi Zoku Shou 2nd Season</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/live/live-3.jpg">
                                    <div class="ep">18 / 18</div>
                                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                </div>
                                <div class="product__item__text">
                                    <ul>
                                        <li>Active</li>
                                        <li>Movie</li>
                                    </ul>
                                    <h5><a href="#">Mushishi Zoku Shou: Suzu no Shizuku</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/live/live-4.jpg">
                                    <div class="ep">18 / 18</div>
                                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                </div>
                                <div class="product__item__text">
                                    <ul>
                                        <li>Active</li>
                                        <li>Movie</li>
                                    </ul>
                                    <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/live/live-5.jpg">
                                    <div class="ep">18 / 18</div>
                                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                </div>
                                <div class="product__item__text">
                                    <ul>
                                        <li>Active</li>
                                        <li>Movie</li>
                                    </ul>
                                    <h5><a href="#">Fate/stay night Movie: Heaven's Feel - II. Lost</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/live/live-6.jpg">
                                    <div class="ep">18 / 18</div>
                                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                </div>
                                <div class="product__item__text">
                                    <ul>
                                        <li>Active</li>
                                        <li>Movie</li>
                                    </ul>
                                    <h5><a href="#">Kizumonogatari II: Nekketsu-hen</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
                    <div class="product__sidebar__view">
                        <div class="row">
                            <div class="col">
                                <div class="section-title">
                                    <h5>Top 10 Airing</h5>
                                </div>
                            </div>
                            <div class="col">
                                <div class="btn__all">
                                    <a href="{{ route('anime.trending') }}" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="filter__gallery">
                            @foreach ($top_airing as $p)
                            <div class="product__sidebar__view__item set-bg mix day years"
                                data-setbg="{{ $p['image_url'] }}">
                                <div class="ep">{{ $p['rank'] }}</div>
                                <div class="view bg-success"><i class="fa fa-star"></i> {{ $p['score'] }}</div>
                                <h5><a href="{{ url('anime/details/' . $p['mal_id'] . '/' . str_slug($p['title'], '-')) }}">{{ $p['title'] }}</a></h5>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="product__sidebar__comment">
                        <div class="section-title">
                            <h5>New Comment</h5>
                        </div>
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <img src="img/sidebar/comment-1.jpg" alt="">
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                                <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                            </div>
                        </div>
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <img src="img/sidebar/comment-2.jpg" alt="">
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Shirogane Tamashii hen Kouhan sen</a></h5>
                                <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                            </div>
                        </div>
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <img src="img/sidebar/comment-3.jpg" alt="">
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Kizumonogatari III: Reiket su-hen</a></h5>
                                <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                            </div>
                        </div>
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <img src="img/sidebar/comment-4.jpg" alt="">
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Monogatari Series: Second Season</a></h5>
                                <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection