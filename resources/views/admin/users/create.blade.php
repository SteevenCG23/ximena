@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de estudiante</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese la información requerida</h3>
                </div>

                <div class="card-body">
                    <form action="{{url('/admin/users/storeUser')}}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">N.Documento</label><b>*</b>
                                    <input type="number" value="{{old('studentId')}}" name="studentId" class="form-control"  min="100000" max="999999999999999" required>
                                    @error('number')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre</label><b>*</b>
                                    <input type="text" value="{{old('name')}}" name="name" class="form-control" minlength="4" maxlength="40" pattern="[A-Za-z\s]+" title="Solo se permiten letras" required>
                                    @error('name')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Edad</label><b>*</b>
                                    <input type="int" value="{{old('age')}}" name="age" class="form-control" maxlength="2" required>
                                    @error('age')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="grade">Grado</label><b>*</b>
                                    <select name="grade" class="form-control" required>
                                        <option value="" disabled selected>Seleccione el grado</option>
                                        <option value="Primero">Primero</option>
                                        <option value="Segundo">Segundo</option>
                                        <option value="Tercero">Tercero</option>
                                        <option value="Cuarto">Cuarto</option>
                                        <option value="Quinto">Quinto</option>
                                    </select>
                                    @error('grade')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Dieta</label><b>*</b>
                                    <select name="dietId" class="form-control" required>
                                        <option value="">Selecciona una dieta</option>
                                        @foreach($diets as $diet)
                                            <option value="{{ $diet->id }}">{{ $diet->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('dietId')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('admin/users/usersIndex') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar estudiante</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
