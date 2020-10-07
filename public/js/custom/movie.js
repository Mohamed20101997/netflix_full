$(document).ready(function(){

    let favcount = $('#nav__fav-count').data('fav-count');

    $(document).on('click','.movie__fav-icon' , function(){

       let url = $(this).data('url');
       let movieId = $(this).data('id');
       let isFavored = $(this).hasClass('fw-900');

       if(isFavored)
       {
            favcount--

        }else{

            favcount++
        }

        $('#nav__fav-count').html(favcount);

        $('.movie-'+ movieId).toggleClass('fw-900');

        $.ajax({

            url:url,
            method:'POST',
            success:function(){



            }

        })


    })


});
