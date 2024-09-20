@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de dieta</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese la información requerida</h3>
                </div>

                <div class="card-body">
                    <form action="{{url('/admin/diets/storeDiet')}}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre</label><b>*</b>
                                    <input type="text" value="{{old('name')}}" name="name" class="form-control" minlength="4" maxlength="40" pattern="[A-Za-z\s,áéíóúüñÁÉÍÓÚÜÑ]+" title="Solo se permiten letras" required>
                                    @error('name')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Descripción</label><b>*</b>
                                    <input type="text" value="{{old('description')}}" name="description" class="form-control" minlength="4" maxlength="70" pattern="[A-Za-z\s,áéíóúüñÁÉÍÓÚÜÑ]+" title="Solo se permiten letras" required>
                                    @error('description')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('admin/diets/dietsIndex') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar dieta</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
