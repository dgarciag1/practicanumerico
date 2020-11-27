@extends('user.functions.menu')

@section('functions_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">{{ __('functions.names.roots') }}</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('functions.roots.results') }}">
                    @csrf
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>{{ __('functions.roots.function') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('functions.holder.function') }}" name="function" value="{{ old('function') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('functions.roots.dxFunction') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('functions.holder.dxFunction') }}" name="dxFunction" value="{{ old('dxFunction') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('functions.roots.dxdxFunction') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('functions.holder.dxdxFunction') }}" name="dxdxFunction" value="{{ old('dxdxFunction') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('functions.roots.initialX') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('functions.holder.initialX') }}" name="initialX" value="{{ old('initialX') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('functions.roots.tolerance') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('functions.holder.tolerance') }}" name="tolerance" value="{{ old('tolerance') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('functions.roots.iterations') }}</label>
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
