@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Estudiante: {{ $user->name }}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Estás seguro de eliminar el registro?</h3>
                </div>

                <div class="card-body">
                    <form action="{{url('/admin/users/'.$user->id.'/deleteUser')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">N.Documento:</label>
                                    <input type="number" value="{{$user->studentId}}" name="studentId" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre:</label>
                                    <input type="text" value="{{$user->name}}" name="name" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('admin/users/usersIndex') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-danger">Eliminar estudiante</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
