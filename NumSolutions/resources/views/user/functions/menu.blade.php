@extends('layouts.master')

@section("title", "Functions Methods")

@section('content')
<div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">
            {{ __('functions.methods') }}
        </div>
        <div class="list-group list-group-flush">
            <a href="{{ route('functions.incremental.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('functions.names.incremental') }}</a>
            <a href="{{ route('functions.bisection.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('functions.names.bisection') }}</a>
            <a href="{{ route('functions.falserule.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('functions.names.falseRule') }}</a>
            <a href="{{ route('functions.fixedpoint.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('functions.names.fixedPoint') }}</a>
            <a href="{{ route('functions.newton.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('functions.names.newton') }}</a>
            <a href="{{ route('functions.secant.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('functions.names.secant') }}</a>
            <a href="{{ route('functions.roots.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('functions.names.roots') }}</a>
        </div>
    </div>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light">
            <img src="{{ asset('/icons/arrow-left-right.svg') }}" class="menu-icon" id="menu-toggle">
        </nav>

        <main class="container-fluid">
            @yield('functions_content')
        </main>
    </div>
  </div>

@endsection
