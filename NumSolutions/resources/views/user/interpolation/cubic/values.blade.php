@extends('user.interpolation.menu')

@section('interpolation_content')
<div class="container">
    @include('util.message')
    <div class="card">
        <div class="card-header">
            {{ __('interpolation.names.cubic') }}
                <a class="btn btn-outline-info return-btn" href="{{ route('interpolation.cubic.initial') }}"><img src="{{ asset('/icons/arrow-return-left.svg') }}" class="delete-icon"></a>
        </div>
        <div class="card-body">
            @if($errors->any())
            <ul id="errors">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <form method="POST" action="{{ route('interpolation.cubic.results') }}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        {{ __('interpolation.holder.xvector') }}
                    </div>
                    <div class="card-body">
                            <div class="form-row">
                            @for ($i = 1; $i <= $data['size']; $i++)
                                    <div class="form-group col-md-1">
                                        <label >{{ $i }}</label>
                                        <input type="text" class="form-control" placeholder="{{ old('valuex') }}" name="valuex{{$i}}" value="{{ old('valuex') }}" required/>                               
                                    </div>
                            @endfor
                    </div>    
                    <label class="row justify-content-center col-md-2">{{ __('interpolation.holder.size') }}</label>
                    <input type="text" class="form-control col-md-2" placeholder="{{$data['size']}}" name="size" value="{{ $data['size'] }}" readonly/>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">  
                        {{ __('interpolation.holder.yvector') }}
                    </div>
                    <div class="card-body">                   
                        <div class="form-row">
                            @for ($i = 1; $i <= $data['size']; $i++)
                                <div class="form-group col-md-1">
                                    <label >{{ $i }}</label>
                                    <input type="text" class="form-control" placeholder="{{ old('valuey') }}" name="valuey{{$i}}" value="{{ old('valuey') }}" required/>                               
                                </div>
                            @endfor
                        </div> 
                    </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-outline-success btn-block">{{ __('interpolation.holder.calculate') }}</button>
                        </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
