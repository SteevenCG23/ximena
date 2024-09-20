@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Dieta: {{ $diet->name }}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>

                <div class="card-body">
                    <form action="{{ url('/admin/diets/' . $diet->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Id:</label>
                                    <p>{{ $diet->id }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre:</label>
                                    <p>{{ $diet->name }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Descripción:</label>
                                    <p>{{ $diet->description }}</p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Fecha de registro dieta:</label>
                                    <p>{{ $diet->created_at }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Fecha de actualización dieta:</label>
                                    <p>{{ $diet->updated_at }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('admin/diets/dietsIndex') }}" class="btn btn-secondary">Cancelar</a>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
