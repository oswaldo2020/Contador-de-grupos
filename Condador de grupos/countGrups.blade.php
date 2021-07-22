@extends('layout')

@section('title', 'Prueba6')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <form class="bg-white shadow rounded py-3 px-4">
                <h1 class="display-6 text-center">Verifica cuantos grupos de palabras existen</h1>
                <hr>
                <div class="form-group">
                    <label for="words">Ingresa una frase o cadena de números</label>
                        <input class="form-control bg-light shadow-sm"
                        type="text"
                        id="words"
                        name="words">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block"
                    type="submit"
                    name="procesar"
                    value="procesar"
                    id="enviar" >Codificar Palabras
                    </button><br>
                </div>
            </form>
            @isset($totalWord)
                    <h3 class="list-group-item border-0 mb-1 shadow-sm mx-auto">
                            {{$totalWord}}
                    </h3>
            @endisset
        </div>
    </div>
</div>
@endsection