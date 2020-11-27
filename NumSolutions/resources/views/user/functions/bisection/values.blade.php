@extends('user.functions.menu')

@section('functions_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">{{ __('functions.names.bisection') }}</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('functions.bisection.results') }}">
                    @csrf
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>{{ __('functions.bisection.function') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('functions.holder.function') }}" name="function" value="{{ old('function') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('functions.bisection.aPoint') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('functions.holder.aPoint') }}" name="aPoint" value="{{ old('aPoint') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('functions.bisection.bPoint') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('functions.holder.bPoint') }}" name="bPoint" value="{{ old('bPoint') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('functions.bisection.tolerance') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('functions.holder.tolerance') }}" name="tolerance" value="{{ old('tolerance') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('functions.bisection.iterations') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('functions.holder.iterations') }}" name="iterations" value="{{ old('iterations') }}" />
                            </div>
                        </div>
                    <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-outline-success btn-block">{{ __('functions.holder.calculate') }}</button>
                            </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
