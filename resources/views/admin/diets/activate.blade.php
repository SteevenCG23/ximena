@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Dieta: {{ $diet->name }}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">¿Deseas activar la dieta?</h3>
                </div>

                <div class="card-body">
                    <form action="{{url('/admin/diets/'.$diet->id.'/activateDiet')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" value="{{$diet->name}}" name="name" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Descripción</label>
                                    <input type="text" value="{{$diet->description}}" name="description" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('admin/diets/showInactiveDiets') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-info">Activar dieta</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
