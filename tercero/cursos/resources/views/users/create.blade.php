@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Cursos</h1>
    <form action="{{ route('users.store')}}" method="POST">
       
        @csrf
        @include('users.fields')
    </form>
</div>
@endsection