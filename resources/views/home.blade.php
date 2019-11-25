@extends('template')

@section('css')
<style>
  p{
    font-size: 30px;
  }
  #texto-card{
      width: 50%;
      float: right;
      color: aliceblue;
      text-shadow: 
        -1px -1px 0px #000,
         0px -1px 0px #000,
         1px -1px 0px #000,
        -1px  0px 0px #000,
         1px  0px 0px #000,
        -1px  1px 0px #000,
         0px  1px 0px #000,
         1px  1px 0px #000;
      /* border-radius: 10%;  */
      /* background-color: green; */
  }
  .card-body{
    background-image: url('img/cachorro_home.jpg');
    background-repeat: no-repeat, no-repeat;
    background-position: center;
    padding: 5%;
    background-size: cover;
  }
</style>

@endsection

@section('conteudo')
<header >

        <div style="text-align:center; margin-top: 10%; position: center;" >
          <div class="container">

            <div class="card"  style="
            /* width:770px; */
            padding:20px;
            position: center; margin:auto;">
                <div class="card-body"  >
                {{-- <h1 class="masthead-heading mb-0">One Page Wonder</h1>--}}
                {{-- <img src="{{url('img/cachorro_home.jpg')}}" class="card-img-top" alt="..." style="max-height: 455px; max-width:720px" > --}}
                    <div style="float:right;">

                        <div id="texto-card">

                            <p>O <b>Projeto PATA</b> tem o intuito de possibilitar a adoção de todos os animais que precisam de um lar, sem distinção de raça ou espécie.</p>
                        </div>
                    </div>
                    <a href="/lista" class="btn btn-primary btn-lg rounded-pill mt-5">Conheça os animais cadastrados!</a>
                </div>
            </div>
          </div>
        </div>

        {{-- <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>  --}}
</header>

    <!--
      <section>
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
              <div class="p-5">
                <img class="img-fluid rounded-circle" src="img/01.jpg" alt="">
              </div>
            </div>
            <div class="col-lg-6 order-lg-1">
              <div class="p-5">
                <h2 class="display-4">For those about to rock...</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="p-5">
                <img class="img-fluid rounded-circle" src="img/02.jpg" alt="">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="p-5">
                <h2 class="display-4">We salute you!</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
              <div class="p-5">
                <img class="img-fluid rounded-circle" src="img/03.jpg" alt="">
              </div>
            </div>
            <div class="col-lg-6 order-lg-1">
              <div class="p-5">
                <h2 class="display-4">Let there be rock!</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
              </div>
            </div>
          </div>
        </div>
      </section> -->
@endsection


@section('titulo_help')
    Home Page
@endsection

@section('help')
Esta página apresenta uma mensagem que explica o que é o intuito do projeto. O usuário pare clicar no botão “Conheça os animais cadastrados!” para ter acesso a lista contendo os animais registrados no sistema
@endsection
