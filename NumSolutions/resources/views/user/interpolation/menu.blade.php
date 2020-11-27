@extends('layouts.master')

@section("title", "interpolation Methods")

@section('content')
<div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">
            {{ __('interpolation.methods') }}
        </div>
        <div class="list-group list-group-flush">
            <a href="{{ route('interpolation.vandermonde.initial') }}" class="list-group-item list-group-item-action bg-light">{{ __('interpolation.names.vandermonde') }}</a>
            <a href="{{ route('interpolation.newtondiv.initial') }}" class="list-group-item list-group-item-action bg-light">{{ __('interpolation.names.newtondiv') }}</a>
            <a href="{{ route('interpolation.lagrange.initial') }}" class="list-group-item list-group-item-action bg-light">{{ __('interpolation.names.lagrange') }}</a>
            <a href="{{ route('interpolation.lineal.initial') }}" class="list-group-item list-group-item-action bg-light">{{ __('interpolation.names.lineal') }}</a>
            <a href="{{ route('interpolation.cuadratic.initial') }}" class="list-group-item list-group-item-action bg-light">{{ __('interpolation.names.cuadratic') }}</a>
            <a href="{{ route('interpolation.cubic.initial') }}" class="list-group-item list-group-item-action bg-light">{{ __('interpolation.names.cubic') }}</a>
        </div>
    </div>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light">
            <img src="{{ asset('/icons/arrow-left-right.svg') }}" class="menu-icon" id="menu-toggle">
        </nav>

        <main class="container-fluid">
            @yield('interpolation_content')
        </main>
    </div>
  </div>

@endsection
