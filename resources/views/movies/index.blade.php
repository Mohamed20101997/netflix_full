@extends('layouts.app')

@section('content')


<section class="text-white" id="listing" style="min-height: 100vh; padding: 8% 0">

    @include('layouts._nav')

        <div class="container">
            <div class="row">
                <div class="col">

                    <h2 class="fw-300">{{ request()->category_name ?? 'Favorite'}} Movies</h2>

                </div>{{-- end of col --}}

            </div>{{-- end of row --}}


            <div class="row {{ request()->favorite ? 'favorite': '' }}">

                @if($movies->count() > 0)

                   @foreach ($movies as $movie)

                   <div class="movie col-md-3 my-3 p-0">

                    <img src="{{ $movie->poster_path }}" class="img-fluid" alt="togo">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">{{ $movie->name }}</p>
                            <p class="mb-0 movie__year align-self-center">{{ $movie->year }}<p>
                        </div>

                        <div class="d-flex movie__rating">

                            <div class="mr-2">
                                @for ($i = 0; $i < $movie->rating; $i++)
                                    <span class="fas fa-star text-primary mr-1"></span>
                                @endfor
                            </div>

                            <p class="align-self-center">{{ $movie->rating }}</p>

                        </div> <!--end of movie rating -->

                        <div class="movie__views">
                            <p>Views: 650</p>
                        </div>

                        <div class=" d-flex movie__cta">
                            <a href="{{route('movies.show', $movie->id) }}" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>

                            @auth
                                <i class="far fa-heart align-self-center movie__fav-icon {{$movie->is_favored ? 'fw-900': ''}} movie-{{$movie->id}}"
                                    data-url="{{ route('movies.toggle_favorite', $movie->id) }}"
                                    data-id="{{$movie->id}}"
                                    >
                                </i>

                            @else
                                <a href="{{route('login')}}" class="text-white align-self-center"><i class="far fa-heart align-self-center movie__fav-icon"></i></a>
                            @endauth
                        </div>



                    </div> <!--end of movie details -->

                </div> <!-- end of col -->

                   @endforeach

                @else

                    <div class="col">
                        <h5 class="fw-300">Sorry no movies found</h5>
                    </div>
                @endif


            </div>{{-- end of row --}}

        </div> {{-- end of container --}}


    </section>


    @include('layouts._footer')
    @endsection
