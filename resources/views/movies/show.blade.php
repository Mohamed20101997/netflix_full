@extends('layouts.app')

@section('content')

    <section id="show">

        @include('layouts._nav')

        <div class="movie">

            <div class="movie__bg" style="background: linear-gradient(rgba(0,0,0, 0.7), rgba(0,0,0, 0.7)), url({{$movie->image->path}}) center/cover no-repeat;"></div>

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
                            <span class="align-self-center">{{movie->rating}}</span>
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

                <div class="movie p-0">
                    <img src="dist/images/Togo-poster.jpg" class="img-fluid" alt="togo">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Togo</p>
                            <p class="mb-0 movie__year align-self-center">2019<p">
                        </div>

                        <div class="d-flex movie__rating">

                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>

                            <p class="align-self-center">3.2</p>

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

                <div class="movie p-0">
                    <img src="dist/images/the-king-poster.jpg" class="img-fluid" alt="theKing">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name"> The King</p>
                            <p class="mb-0 movie__year align-self-center">2019<p">
                        </div>

                        <div class="d-flex movie__rating">

                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>

                            <p class="align-self-center">3.2</p>

                        </div> <!--end of movie rating -->

                        <div class="movie__views">
                            <p>Views: 850</p>
                        </div>

                        <div class=" d-flex movie__cta">
                            <a href="#" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                            <i class="far fa-heart align-self-center movie__fav-btn"></i>
                        </div>



                    </div> <!--end of movie details -->

                </div> <!-- end of col -->

                <div class="movie p-0">
                    <img src="dist/images/notime.jpg" class="img-fluid" alt="notime">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">No Time To Die</p>
                            <p class="mb-0 movie__year align-self-center">2019<p">
                        </div>

                        <div class="d-flex movie__rating">

                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>

                            <p class="align-self-center">3.2</p>

                        </div> <!--end of movie rating -->

                        <div class="movie__views">
                            <p>Views: 2000</p>
                        </div>

                        <div class=" d-flex movie__cta">
                            <a href="#" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                            <i class="far fa-heart align-self-center movie__fav-btn"></i>
                        </div>



                    </div> <!--end of movie details -->

                </div> <!-- end of col -->

                <div class="movie p-0">
                    <img src="dist/images/cometodaddyposter.jpg" class="img-fluid" alt="cometodaddy">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Come To Daddy</p>
                            <p class="mb-0 movie__year align-self-center">2016<p">
                        </div>

                        <div class="d-flex movie__rating">

                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>

                            <p class="align-self-center">2.5</p>

                        </div> <!--end of movie rating -->

                        <div class="movie__views">
                            <p>Views: 150</p>
                        </div>

                        <div class=" d-flex movie__cta">
                            <a href="#" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                            <i class="far fa-heart align-self-center movie__fav-btn"></i>
                        </div>



                    </div> <!--end of movie details -->

                </div> <!-- end of col -->

                <div class="movie p-0">
                    <img src="dist/images/jumanji-poster.jpg" class="img-fluid" alt="jumanji">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">jumanji</p>
                            <p class="mb-0 movie__year align-self-center">2019<p">
                        </div>

                        <div class="d-flex movie__rating">

                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>

                            <p class="align-self-center">4.9</p>

                        </div> <!--end of movie rating -->

                        <div class="movie__views">
                            <p>Views: 11200</p>
                        </div>

                        <div class=" d-flex movie__cta">
                            <a href="#" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                            <i class="far fa-heart align-self-center movie__fav-btn"></i>
                        </div>



                    </div> <!--end of movie details -->

                </div> <!-- end of col -->

            </div>

        </div> <!-- end of container -->

    </section> <!--end of listing section-->

    @include('layouts._footer')
@endsection
