@extends('websites.layouts.index')
@section('content')

    <section id="articles">
        <h2 class="articles-head">المقالات </h2>
        <div class="container custom" style="direction: ltr;margin-top: 100px;margin-bottom: 100px">
            <div class="owl-carousel owl-theme" id="owl-articles">

                @foreach($posts as $post)
                    <div class="item">
                        <div class="card" style="width: 22rem;">

                            <i onclick="toggleFavourite(this)" id="{{$post->id}}" class="fab fa-gratipay
{{$post->is_favourite ? 'second-heart' : 'first-heart'}}
                                    "></i>

                            {{--                            <i  class="fab fa-gratipay second-heart"></i>--}}

                            <img class="card-img-top" src="{{ asset($post->image) }}" style="height: 17rem;"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->content }}</p>
                                <a href="{{url(route('welcome.article',$post->id))}}">
                                    <button class="btn details-btn">التفاصيل</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="text-center" style="margin-right: 430px;margin-top: 50px; ">{{$posts->links()}}</div>
    </section>
@endsection