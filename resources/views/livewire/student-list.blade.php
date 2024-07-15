<div>
    <div>
        <div class="container-fluid my-3">


            <form class="row g-3 mb-4">
                @csrf
                <div class="box-content2">
                    <input type="text"  wire:model="search" name="buscador" placeholder="Busca a un usuarios por nombre o correo." >
                    <button class="btn-n2 btn-consult2"><i class="fas fa-search"></i></button>
                </div>
                <div class="col-auto d-none">
                    <button type="button" class="btn btn-primary mb-3">Buscar</button>
                </div>
            </form>
       </div>
    
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0" style="overflow:scroll;max-height:400px;">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                            ID
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                            Cedula</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                            Usuario</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                            Nombre Completo</th>
                        <th
                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                            </th>
                            
                        
                    </tr>
                </thead>
                <tbody>
                    @php
                        $k = 0;
                    @endphp
                    @foreach ($users as $item)

                    @php
                        $k++;
                    @endphp
                    <tr>
                        <td class="text-center">
                           <small> {{ $k }}</small>
                        </td>
                        <td class="text-center">
                            <b>
                                <span class="badge badge-sm bg-green"> {{ $item->nit }}</span>
                            </b>
                        </td>
                        <td class="text-center">
                            <small>@ {{ $item->username }}</small>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-success">{{ $item->firstname }} {{ $item->lastname }}</span>
                        </td>
                       
                        <td class="text-center">
                            <a href="{{ route('listStudent',$item->id) }}"><i class="fas fa-arrow-right bg-rounded-green" style="font-size: 25px;"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    
                    @if ($k == 0)
                        <tr>
                            <td colspan="8" class="text-center">
                                <small> 
                                    No existen estudiantes agregados.
                                </small>
                            </td>
                        </tr>
                    @endif
    
                </tbody>
    
                <tfoot>
                   
                </tfoot>
            </table>
        </div>
    </div>    
</div>

