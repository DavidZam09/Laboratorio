@extends ('layouts.layout')
@section ('content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Ingresos<a href="ingresoV/create">
                <button class="btn btn-success">Nuevo</button></a></h3>
        @include('ingresoV.search')
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Vehiculo/Placa</th>
                    <th>Estado</th>
                    <th>Usuario</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($ingreso as $ingreso)
                <tr>
                    <td>{{ $ingreso->id}}</td>
                    <td>{{ $ingrso->fecha_ingreso}}</td>
                    <td>{{ $ingreso->vehiculo->placa}}</td>
                    <td>{{ $ingreso->estado}}</td>
                    <td>{{ $ingreso->users_id}}</td>

                    <td>
                        <a href="{{URL::action('Ingreso_vehiculoController@edit',$ingreso->id)}}">
                            <button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$ingreso->id}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar</button></a>
                    </td>
                </tr>
                @include('ingresoV.modal')
                @endforeach
            </table>
        </div>
       
    </div>
</div>
@endsection