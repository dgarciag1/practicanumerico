@extends('user.interpolation.menu')

@section('interpolation_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">{{ __('interpolation.names.cuadratic') }}</div>
                    <div class="card-body">
                    @if($errors->any())
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('interpolation.cuadratic.values') }}">
                        @csrf
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>{{ __('interpolation.holder.size') }}</label>
                                    <input type="text" class="form-control" placeholder="{{ __('interpolation.holder.inputSize') }}" name="size" value="{{ old('size') }}" />
                                </div>
                            </div>
                        <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-outline-success btn-block">{{ __('interpolation.holder.continue') }}</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
