@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de dietas</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">

                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <a href="{{ url('admin/diets/dietsIndex') }}" class="btn bg-secondary active" >
                            <input type="radio" name="options" id="option_b1" autocomplete="off">Activos
                        </a>
                        <a href="{{ url('admin/diets/showInactiveDiets') }}" class="btn bg-secondary">
                            <input type="radio" name="options" id="option_b2" autocomplete="off" checked="">Inactivos
                        </a>
                    </div>

                    <div class="card-tools">
                        <a href="{{ url('admin/diets/createDiet') }}" class="btn btn-primary">
                            Registrar nueva
                        </a>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table table-dark table-striped table-hover table-sm text-center">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diets as $diet)
                                @if ($diet['status'] !== 'activo')
                                    <tr>
                                        <td>{{ $diet->id }}</td>
                                        <td>{{ $diet->name }}</td>
                                        <td>{{ $diet->description }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ url('admin/diets/' . $diet->id.'/confirmActivateDiet') }}" type="button"
                                                    class="btn btn-info btn-sm" title="Activar"><i class="bi bi-check-square"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
