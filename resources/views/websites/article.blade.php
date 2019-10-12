@extends('websites.layouts.index')
@section('content')


    <section id="breedcrumb" style="
      padding-bottom: 2rem;
  ">>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                            <li class="breadcrumb-item"><a href="#">المقالات</a></li>
                            <li class="breadcrumb-item active" aria-current="page">طريقه الوقاية من الامراض</li>
                        </ol>
                    </nav>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img class="article-img shadow p-3 mb-5 " src="{{ asset($post->image) }}">
                    <div class="artilce-head">
                        <p class="article-name">طريقة الوقاية من الامراض </p>
                    </div>
                    <div class="article-content shadow">
                        <p class="content"> {{$post->content}} </p>
                        <img class="share-icon custom-position" src="{{asset('')}}website/imgs/social-share-symbol.png">
                        <p class="custom-position2">شارك هذه المقاله :</p>
                        <div class="social-share">
                            <i class="fab fa-facebook-square"></i>
                            <i class="fab fa-twitter-square"></i>

                            <i class="fab fa-google-plus-square"></i>


                        </div>

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <section id="articles">
                        <h2 class="articles-relative">مقالات ذات صلة </h2>
                        <div class="container custom" style="direction: ltr">
                            <div class="owl-carousel owl-theme" id="owl-articles">

                                @foreach($posts as $post)
                                    <div class="item">
                                        <div class="card" style="width: 22rem;">
                                            <i onclick="toggleFavourite(this)" id="{{$post->id}}" class="fab fa-gratipay
{{$post->is_favourite ? 'second-heart' : 'first-heart'}}
                                                    "></i>
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
                    </section>

                </div>

            </div>
        </div>


    </section>

    @push('js')

        <script>
            function toggleFavourite(heart) {
                console.log(heart.id);
                var currentClass = $(heart).attr('class');
// send ajax
                $.ajax({
                    url: "{{url('client/fav')}}",
                    type: 'post',
                    data: {post_id: heart.id, _token: "{{csrf_token()}}"},
                    success: function (data) {
                        console.log(data);
                        if (data.status == 1) {
                            // success
                            if (currentClass.includes('first')) {
                                // not fav
                                $(heart).removeClass('first-heart').addClass('second-heart');
                            } else {
                                // is fav
                                $(heart).removeClass('second-heart').addClass('first-heart');
                            }
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }
        </script>
    @endpush
@endsection