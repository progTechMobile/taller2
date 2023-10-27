@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <h2>Guests:</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Edad</th>
                                <th>Hora de Ingreso</th>
                                <th>Cantidad de Acompañantes</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guests as $guest)
                                <tr>
                                    <td>{{ $guest->nombre }}</td>
                                    <td>{{ $guest->apellido }}</td>
                                    <td>{{ $guest->edad }}</td>
                                    <td>{{ $guest->horaIngreso }}</td>
                                    <td>{{ $guest->cAcompanantes }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('guests.destroy', ['id' => $guest->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection