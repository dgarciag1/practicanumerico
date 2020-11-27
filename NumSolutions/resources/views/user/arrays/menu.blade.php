@extends('layouts.master')

@section("title", "arrays Methods")

@section('content')
<div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">
            {{ __('arrays.methods') }}
        </div>
        <div class="list-group list-group-flush">
            <a href="{{ route('arrays.elimination.initial') }}" class="list-group-item list-group-item-action bg-light">{{ __('arrays.names.elimination') }}</a>
            <a href="{{ route('arrays.partial.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('arrays.names.partial') }}</a>
            <a href="{{ route('arrays.total.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('arrays.names.total') }}</a>
            <a href="{{ route('arrays.lusimple.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('arrays.names.lusimple') }}</a>
            <a href="{{ route('arrays.lupartial.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('arrays.names.lupartial') }}</a>
            <a href="{{ route('arrays.crout.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('arrays.names.crout') }}</a>
            <a href="{{ route('arrays.doolittle.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('arrays.names.doolittle') }}</a>
            <a href="{{ route('arrays.cholesky.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('arrays.names.cholesky') }}</a>
            <a href="{{ route('arrays.jacobi.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('arrays.names.jacobi') }}</a>
            <a href="{{ route('arrays.gauss.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('arrays.names.gauss') }}</a>
            <a href="{{ route('arrays.sor.values') }}" class="list-group-item list-group-item-action bg-light">{{ __('arrays.names.sor') }}</a>
        </div>
    </div>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light">
            <img src="{{ asset('/icons/arrow-left-right.svg') }}" class="menu-icon" id="menu-toggle">
        </nav>

        <main class="container-fluid">
            @yield('arrays_content')
        </main>
    </div>
  </div>

@endsection
