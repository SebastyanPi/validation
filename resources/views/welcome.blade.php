
@extends('layouts.app')
@section('content')
<div class="center-content">
    <div class="content-text">
        <div  class="content-text-1">
        
            <h1 class="myfont"><b>Verificación de Titulo</b></h1>
            <form method="get" action="{{ route('certificate') }}">
            <div class="box-content">
                    <input type="text" name="nit" placeholder="">
                    <button type="submit" class="btn-n btn-consult"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="content-end">
            <p>Un certificado es original <b>SI</b> coinciden exactamente con todos los datos de validación.</p>
            <h3 class="opacity">https://institutointesa.edu.co/</h3>
        </div>
    </div>         
</div>



@endsection
