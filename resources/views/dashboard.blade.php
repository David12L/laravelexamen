<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <!-- <x-jet-welcome /> -->
@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Pagina de Cursos</h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif

    <form action="{{ route('Estudiante.xRegistrar') }}" method="post" class="d-grid gap-2">
        @csrf

        @error('codEst')
            <div class="alert alert-danger">
                El código es requerido
            </div>
        @enderror

        @error('nomEst')
            <div class="alert alert-danger">
                El curso es requerido
            </div>
        @enderror

        @if($errors ->has('apeEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                las <strong>horas</strong> son requeridas
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <input type="text" name="codEst" placeholder="Código" value="{{ old('codEst') }}" class="form-control mb-2">
        <input type="text" name="nomEst" placeholder="cursos" value="{{ old('nomEst') }}" class="form-control mb-2">
        <input type="text" name="apeEst" placeholder="N° de horas" value="{{ old('apeEst') }}" class="form-control mb-2">
        <input type="date" name="fnaEst" placeholder="Fecha de plan de estudios" value="{{ old('fnaEst') }}" class="form-control mb-2">
        <select name="turMat" class="form-control mb-2">
            <option value="">creditos del curso...</option>
            <option value="1">0.5</option>
            <option value="2">1.0</option>
            <option value="3">2.0</option>
            <option value="3">4.0</option>
        </select>
        <select name="modMat" class="form-control mb-2">
            <option value="">Seleccione tipo de curso...</option>
            <option value="S">Transversal</option>
            <option value="R">Especialidad</option>
        </select>
        <select name="semMat" class="form-control mb-2">
            <option value="">Seleccione semestre del curso...</option>
            @for($i=0; $i < 7; $i++)
                <option value="{{$i}}">Semestre {{$i}}</option>
            @endfor
        </select>
        <select name="estMat" class="form-control mb-2">
            <option value="">Seleccione estado del curso...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>
        <button class="btn btn-primary" type="submit">Agregar</button>
    </form>

    <br>
    <h3>Lista </h3>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Código</th>
                <th scope="col">Cursos </th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($xAlumnos as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->codEst }}</td>
                <td>
                    <a href="{{ route('Estudiante.xDetalle', $item->id ) }}">
                    {{ $item->nomEst }}  
                    </a>
                </td>
                <td>
                    <form action="{{ route('Estudiante.xEliminar',  $item->id) }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">x</button>
                    </form>
                    <a class="btn btn-warning btn-sm" href="{{ route('Estudiante.xActualizar', $item->id ) }}">
                        ...A
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $xAlumnos->links() }}
    
@endsection
            </div>
        </div>
    </div>
</x-app-layout>
