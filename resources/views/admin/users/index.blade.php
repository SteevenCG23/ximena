@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de estudiantes</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">

                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <a href="{{ url('admin/users/usersIndex') }}" class="btn bg-secondary active">
                            <input type="radio" name="options" id="option_b1" autocomplete="off" checked="">Activos
                        </a>
                        <a href="{{ url('admin/users/showInactiveUsers') }}" class="btn bg-secondary">
                            <input type="radio" name="options" id="option_b2" autocomplete="off">Inactivos
                        </a>
                    </div>

                    <div class="card-tools">
                        <a href="{{ url('admin/users/createUser') }}" class="btn btn-primary">
                            Registrar nuevo
                        </a>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table table-dark table-striped table-hover table-sm text-center">
                        <thead>
                            <tr>
                                <th scope="col">N.Documento</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Grado</th>
                                <th scope="col">Dieta</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if ($user['status'] !== 'inactivo')
                                    <tr>
                                        <td>{{ $user->studentId }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->age }}</td>
                                        <td>{{ $user->grade }}</td>
                                        <td>{{ $user->diet ? $user->diet->name : 'No tiene dieta asignada' }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ url('admin/users/' . $user->id . '/show') }}" type="button"
                                                    class="btn btn-info btn-sm" title="Ver"><i class="bi bi-eye"></i></a>
                                                <a href="{{ url('admin/users/' . $user->id . '/edit') }}" type="button"
                                                    class="btn btn-success btn-sm" title="Editar"><i
                                                        class="bi bi-pencil"></i></a>
                                                <a href="{{ url('admin/users/' . $user->id . '/confirmDeleteUser') }}"
                                                    type="button" class="btn btn-danger btn-sm" title="Eliminar"><i
                                                        class="bi bi-trash"></i></a>
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
