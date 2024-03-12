@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Vista de usuarios</h1>
    <a href="{{ route('users.create') }}" class="btn btn-info btn-sm mb-3">Nuevo Usuario</a>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->rol_descripcion }}</td>
                        <td>{{ $user->usu_nombre }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->usu_telefono }}</td>

                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('users.edit', $user->usu_id) }}" class="btn btn-info btn-sm">
                                    <span class="material-symbols-outlined">Editar</span>
                                </a>
                                <form action="{{ route('users.destroy', $user->usu_id) }}" method="POST" onsubmit="return confirm('Desea eliminar el usuario?')" class="ms-1">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <span class="material-symbols-outlined">Eliminar</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
