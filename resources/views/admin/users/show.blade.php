@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Estudiante: {{ $user->name }}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>

                <div class="card-body">
                    <form action="{{ url('/admin/users/' . $user->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre:</label>
                                    <p>{{ $user->name }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">N.Documento:</label>
                                    <p>{{ $user->studentId }}</p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Dieta:</label>
                                    <p>{{ $user->diet ? $user->diet->name : 'No tiene dieta asignada' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Descripción:</label>
                                    <p>{{ $user->diet->description }}</p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Fecha de registro estudiante:</label>
                                    <p>{{ $user->created_at }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Fecha de actualización estudiante:</label>
                                    <p>{{ $user->updated_at }}</p>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('admin/users/usersIndex') }}" class="btn btn-secondary">Cancelar</a>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
