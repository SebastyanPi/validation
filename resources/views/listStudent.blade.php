@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card mt-5">
                <div class="card-header"><h3 class="myfont">Verificación de Titulos</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   

                   
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                   <p style="font-size: 20px">
                    <b>Cedula</b> :  {{ $user->nit }} <br>
                    <b>Nombre Completo</b> :  {{ $user->firstname }} {{ $user->lastname }} <br>
                   </p>

                   <button class="btn bg-varita" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-magic"></i> Verificación</button>

                </div>
            </div>

            @foreach ($certification as $item)
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div>
                                <img src="{{ env('APP_URL') }}vendor/img/medalla.png" alt="" width="140px">
                            </div>
                            <div>
                                <span><b>Codigo de Validación : </b> <span  class="bg-ticket">{{$item->code }}</span></span> 
                                <br />
                                <span><b>Certificado : </b>{{$item->type }} {{$item->title }}</span> 
                                <br />
                                <span><b>Fecha de Registro : </b>{{$item->register }}</span>
                                <br />
                                <span><b>Acta : </b>{{$item->acta }}</span>
                                <br />
                                <span><b>Folio: </b>{{$item->folio }}</span>

                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
            

          
        </div>
    </div>
    <div class="bakdoor">
        <i class="fas fa-arrow-left clickArrow"></i>
        <a href="{{ route('home') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="btn btn-green-ligth text-white d-none clickEnlace"></a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header bg-verify">
          <h1 class="modal-title fs-5 fontLetter" id="staticBackdropLabel">Verificación de Titulo</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('addCertification') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="box-input">
                    <span><b>CC O TI : </b></span>
                    <input type="number" name="nit" value="{{ $user->nit }}">
                </div>
                <div class="box-input">
                    <span><b>NOMBRE : </b></span>
                    <input type="text" value=" {{ $user->firstname }} {{ $user->lastname }}">
                </div>
                <div class="box-input">
                    <span><b>TIPO : </b></span>
                    <select name="type" id="">
                        <option value="Tecnico Laboral">Tecnico Laboral</option>
                        <option value="Curso">Curso</option>
                        <option value="Diplomado">Diplomado</option>
                        <option value="Seminario">Seminario</option>
                        <option value="Certificado">Certificado</option>
                    </select>
                </div>
                <div class="box-input">
                    <span><b>TITULO : </b></span>
                    <select name="title" id="">
                        @foreach ($programs as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="box-input">
                    <span><b>FECHA DE REGISTRO : </b></span>
                    <input type="date" name="register">
                </div>
                <div class="box-input">
                    <span><b>ACTA : </b></span>
                    <input type="number" name="acta">
                </div>
                <div class="box-input">
                    <span><b>FOLIO : </b></span>
                    <input type="number" name="folio">
                </div>
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn bg-varita">Guardar</button>
        </div>
    </form>
      </div>
    </div>
  </div>

<script>
    const button = document.querySelector('.clickArrow');
    button.addEventListener("click", (event) => {
        const button2 = document.querySelector('.clickEnlace');
        button2.click();
    });
</script>

@endsection
