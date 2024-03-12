@extends('layouts.app')


@section('content')
<div class="container">

<h1>Usuarios</h1>

<style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
        }

        select, button {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

 <form action="{{route('api.con')}}" method="POST">
 	

        @csrf

        <label for="jornada">Jornada:</label>
        <select name="jor_id" id="jor_id">
        	@foreach($jornadas as $j)
        	 <option value="{{$j['id']}}" >{{$j['jor_descripcion']}}</option>
        	@endforeach
        </select>

        <label for="especialidad">Especialidades:</label>
        <select name="esp_id" id="esp_id">
            @foreach($especialidades as $e)
        	 <option value="{{$e['id']}}" >{{$e['esp_descripcion']}}</option>
        	@endforeach
        </select>

        <label for="cursos">Curso:</label>
        <select name="cur_id" id="cur_id">
            @foreach($cursos as $c)
        	 <option value="{{$c['id']}}" >{{$c['cur_descripcion']}}</option>
        	@endforeach
        </select>

        <label for="paralelo">Paralelo:</label>
        <select name="paralelo" id="paralelo">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
        </select>

        <label for="mes">Mes:</label>
        <select name="mes" id="mes">
            <option value="1">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
            <!-- Añadir más meses según sea necesario -->
        </select>

        <button type="submit">Buscar</button>

 </form>
   



<a href="{{route('users.create')}}" class="btn btn-success">AÑADIR</a>


  <a  class="btn btn-success" href="{{route('user.export')}}">EXCEL</a> 
  <a  class="btn btn-success" href="{{route('api.con')}}">API</a> 

</div>

<table>
	<tr>
		<th>#</th>
		<th>USUARIO</th>
		<th>ROLES</th>
		<th>NOMBRES</th>
		<th>CORREO</th>
	</tr>



</table>
@endsection