@extends('layouts.app')

@section('content')
    <h4>Esta es la vista index de cursos</h4>
    <a href="{{ route('cursos.create') }}" class="btn btn-info">Nuevo Curso</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Grupo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $curso->cur_titulo }}</td>
                    <td>{{ $curso->cur_descripcion }}</td>
                    <td>{{ $curso->cur_grupo }}</td>
                    <td>{{ $curso->cur_estado == 1 ? 'Activo' : 'Inactivo' }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('cursos.edit', $curso->cur_id) }}" class="btn btn-info btn-sm">Editar</a>
                            <form action="{{ route('cursos.destroy', $curso->cur_id) }}" method="POST" onsubmit="return confirm('Desea eliminar el curso?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
