$(document).ready(function(){

    let favcount = $('#nav__fav-count').data('fav-count');

    $(document).on('click','.movie__fav-icon' , function(){

       let url = $(this).data('url');
       let movieId = $(this).data('id');
       let isFavored = $(this).hasClass('fw-900');

        isFavored ? favcount-- :  favcount++ ;

        favcount > 9 ? $('#nav__fav-count').html('9+') : $('#nav__fav-count').html(favcount) ;

        $('.movie-'+ movieId).toggleClass('fw-900');

        if($('.movie-'+ movieId).closest('.favorite').length){

            $('.movie-'+ movieId).closest('.movie').remove();

        }

        $.ajax({

            url:url,
            method:'POST',
            success:function(){


            }

        })


    })


});
