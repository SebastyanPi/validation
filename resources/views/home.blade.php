@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mt-5 text-center">
                <div class="text-center pt-2 pb-3">
                    <span class="myfont pt-4">Verificación de Titulo</span>
                </div>

                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="btn btn-green-ligth text-white d-none">
                    <i class="fas fa-door-open"></i> Salir
                </a>
            </div>
            <div class="card d-none">
                <div class="card-header"><h3><i class="fas fa-graduation-cap"></i> Verificación de Titulos</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                    Bienvenid@!

                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="btn btn-green-ligth d-none">
                        <i class="fas fa-door-open"></i> Salir
                    </a>
                    
                </div>
            </div>
            <div>
                @livewire('student-list')
            </div>
        </div>
    </div>

    <div class="bakdoor">
        <i class="fas fa-door-open clickDoor"></i>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="btn btn-green-ligth text-white d-none enlace">
           
        </a>
    </div>
</div>


<script>
    const button = document.querySelector('.clickDoor');
    button.addEventListener("click", (event) => {
        const enlace = document.querySelector('.enlace');
        enlace.click();
    });
</script>
@endsection
