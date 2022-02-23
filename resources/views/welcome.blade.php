@extends('layouts.app')

@section('content')
    <h>Bienvenido</h>
    @empty($productos)
        <div class="alert alert-danger" role="alert">
            No existe productos aun
        </div>

    @else
        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-3">
{{--                    @include('components.product-card', ['test' => 'testing'])--}}
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    @endempty
@endsection
