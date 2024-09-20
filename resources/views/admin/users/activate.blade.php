@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Estudiante: {{ $user->name }}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">¿Deseas activar el estudiante?</h3>
                </div>

                <div class="card-body">
                    <form action="{{url('/admin/users/'.$user->id.'/activateUser')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">N.Documento</label>
                                    <input type="text" value="{{$user->studentId}}" name="studenId" class="form-control" disabled>
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
                                    <a href="{{ url('admin/users/showInactiveUsers') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-info">Activar estudiante</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
