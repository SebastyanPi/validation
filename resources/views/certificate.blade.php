@extends('layouts.app')

@section('content')
<div class="container mt-4" >
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card mt-5">
                <div class="card-header"><h3 class="myfont">Verificación de Titulos </h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <p style="font-size: 18px">
                    <b>Cedula</b> :  {{ $user->nit }} <br>
                    <b>Nombre Completo</b> :  {{ $user->firstname }} {{ $user->lastname }} <br>
                   </p>

                </div>
            </div>
            @isset ($certification)
                @foreach ($certification as $item)
                <div class="card mt-2"  > 
                    <div class="card-body" >
                        <div class="d-flex" >
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
                                <br>
                                <a href="{{ route('generate.certificate') }}">Generar</a>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
            @endisset
            <div class="d-flex justify-content-end mt-2">
                <a class="btn bg-verify " href="{{ route('welcome') }}"><i class="fas fa-arrow-left"></i> Regresar</a>
            </div>
            

          
        </div>
    </div>

</div>



@endsection
