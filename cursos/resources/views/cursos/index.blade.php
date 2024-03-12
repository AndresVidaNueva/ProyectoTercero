@extends('layouts.app')
@section('content')
<h1>Esta es la vista index de cursos</h1>
<a href="{{ route('cursos.create')}}" class="btn btn-info">Nuevo Cursos</a>
<table class="table">
    <tr>
        <th style="color: white;">#</th>
        <th style="color: white;">Titulo</th>
        <th style="color: white;">Descripcion</th>
        <th style="color: white;">Grupo</th>
        <th style="color: white;">Estado</th>
        <th style="color: white;">Aciones</th>

    </tr>

    @foreach($cursos as $c)
    <tr>
        <td style="color: white;">{{ $loop->iteration}}</td>
        <td style="color: white;">{{ $c->cur_titulo}}</td>
        <td style="color: white;">{{ $c->cur_descripcion}}</td>
        <td style="color: white;">{{ $c->cur_grupo}}</td>
        <td style="color: white;">{{ $c->cur_estado==1?'Activo':'Inactivo' }}</td>

           <td>
            <a href="{{ route('cursos.edit',$c->cur_id) }}" class="btn btn-info btn-sm">Editar</a>
           <form action="{{ route('cursos.destroy',$c->cur_id) }}" method="POST" onsubmit="return confirm('Desea eliminar el curso?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
           </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection