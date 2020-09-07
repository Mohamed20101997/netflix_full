@extends('layouts.app')

@section('content')

    <section id="show">

        @include('layouts._nav')

        <div class="movie">

            <div class="movie__bg" style="background: linear-gradient(rgba(0,0,0, 0.7), rgba(0,0,0, 0.7)), url({{$movie->image_path}}) center/cover no-repeat;"></div>

            <div class="container">

                <div class="row">

                    <div class="col-md-8">

                        <div id="player"></div>

                    </div> <!--end of col-->


                    <div class="col-md-4 text-white">

                        <h3 class="movie__name fw-300">{{$movie->name}}</h3>

                        <div class="movie__rating d-flex my-1">
                            <div class="d-flex">
                                @for($i=0; $i<$movie->rating; $i++)

                                    <i class="fas fa-star text-primary mr-2"></i>

                                @endfor

                            </div>
                            <span class="align-self-center">{{$movie->rating}}</span>
                        </div>

                        <p class="movie__description my-3">{{$movie->description}}</p>

                        <a href="#" class="btn btn-primary text-capitalize my-3"><i class="far fa-heart"></i> add to favorites</a>


                    </div> <!--end of col-->


                </div> <!-- end of row-->

            </div> <!-- end of container-->

        </div><!-- end of movie-->

    </section> <!-- end of banner section-->

    <section id="listing" class="py-2">

        <div class="container">

            <div class="row my-4">

                <div class="col-12 d-flex justify-content-between">
                    <h3 class="listing__title fw-300 text-white">Related Movies</h3>
                </div>


            </div><!-- end of row -->

            <div class="movies owl-carousel owl-theme">

                @foreach ($movies as $movie)

                <div class="movie p-0">

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
                            <a href="show.html" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                            <i class="far fa-heart align-self-center movie__fav-btn"></i>
                        </div>



                    </div> <!--end of movie details -->

                </div> <!-- end of col -->

                @endforeach


            </div> <!-- end of row -->

        </div> <!-- end of container -->

    </section> <!--end of listing section-->

    @include('layouts._footer')
@endsection


@push('scripts')

<script>
    var file =
            "[Auto]{{ Storage::url('movies/'. $movie->id . '/' . $movie->id . '.m3u8') }}, " +
            "[360]{{ Storage::url('movies/'. $movie->id . '/' . $movie->id . '_0_100.m3u8') }}, " +
            "[480]{ Storage::url('movies/'. $movie->id . '/' . $movie->id . '_1_250.m3u8') }}, " +
            "[720]{{ Storage::url('movies/'. $movie->id . '/' . $movie->id . '_2_500.m3u8') }}, " ;

var player = new Playerjs({
    id:"player",
    file: file,
    poster : "{{ $movie->image_path  }}",
    default_quality : "Auto"
    });
</script>

@endpush
