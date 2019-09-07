@extends('template')

@section('conteudo')
<!-- alternate codepen version https://codepen.io/mad-d/pen/aJMPWr?editors=0010 -->
<h1>Avaliação da postagem #{{$cod_postagem}}</h1>
<div class="stars" data-rating="1">
    <span class="star">&nbsp;</span>
    <span class="star">&nbsp;</span>
    <span class="star">&nbsp;</span>
    <span class="star">&nbsp;</span>
    <span class="star">&nbsp;</span>
</div>


<form method="POST" action="{{url('/postagem/'.$cod_postagem.'/avaliar')}} ">
    @csrf
    <input type="hidden" value="0" class="nota" name="nota">
    <button type="submit" class="btn btn-primary">Avaliar</button>
</form>

<script >
    //DOMContenteLoaded é uma evento adicionado depos do html ser complempletamente lido
    document.addEventListener('DOMContentLoaded', function(){
        let stars = document.querySelectorAll('.star');

        stars.forEach(function(star){
            star.addEventListener('click', setRating);

        });
        let rating = parseInt(document.querySelector('.stars').getAttribute('data-rating'));
        let target = stars[rating-1];
        target.dispatchEvent(new MouseEvent('click'))

    });

    function setRating(ev){
        let span = ev.currentTarget;
        // alert(span);
        let stars = document.querySelectorAll('.star');
        let match = false;
        let num= 0;
        stars.forEach(function(star, index){
            if (match) {
                star.classList.remove('rated');
            }
            else{
                star.classList.add('rated');
            }
            if (star === span) {
                match = true;
                num = index +1;
            }
            // index++;


        });
        document.querySelector('.stars').setAttribute('data-rating', num);
        document.querySelector('.nota').setAttribute('value', num);


    }

</script>



@endsection

@section('css')
<style>
        .star{
          color: black;
          font-size: 2.0rem;
          padding: 0 1rem; /* space out the stars */
        }
        .star::before{
          content: '\2606';    /* star outline */
          cursor: pointer;
        }
        .star.rated::before{
          /* the style for a selected star */
          content: '\2605';  /* filled star */
        }

        .stars{
            counter-reset: rateme 0;
            font-size: 2.0rem;
            font-weight: 900;
        }
        .star.rated{
            counter-increment: rateme 1;
        }
        /*.stars::after{
            content: counter(rateme) '/5';
        }*/
    </style>
@endsection
