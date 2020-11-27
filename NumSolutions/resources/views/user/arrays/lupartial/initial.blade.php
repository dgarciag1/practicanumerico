@extends('user.arrays.menu')

@section('arrays_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">{{ __('arrays.names.lupartial') }}</div>
                    <div class="card-body">
                    @if($errors->any())
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('arrays.lupartial.values') }}">
                        @csrf
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>{{ __('arrays.holder.size') }}</label>
                                    <input type="text" class="form-control" placeholder="{{ __('arrays.holder.inputSize') }}" name="size" value="{{ old('size') }}" />
                                </div>
                            </div>
                        <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-outline-success btn-block">{{ __('arrays.holder.continue') }}</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
