@extends('user.arrays.menu')

@section('arrays_content')
<div class="container">
    @include('util.message')
    <div class="card">
        <div class="card-header">
            {{ __('arrays.names.doolittle') }}
                <a class="btn btn-outline-info return-btn" href="{{ route('arrays.doolittle.initial') }}"><img src="{{ asset('/icons/arrow-return-left.svg') }}" class="delete-icon"></a>
        </div>
        <div class="card-body">
            @if($errors->any())
            <ul id="errors">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <form method="POST" action="{{ route('arrays.doolittle.results') }}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        {{ __('arrays.holder.matrix') }}
                    </div>
                    <div class="card-body">
                        <?php $x = 1 ?>
                        @for ($i = 1; $i <= $data['size']; $i++)
                            <div class="form-row">
                                @for ($j = 1; $j <= $data['size']; $j++)
                                    <div class="form-group col-md-1">
                                        <label class="row justify-content-center">{{ $x }}</label>
                                        <input type="text" class="form-control" placeholder="{{ old('valuem') }}" name="valuem{{$i}}{{$j}}" value="{{ old('valuem') }}" required/>
                                        <?php ?>
                                    </div>
                                    <?php $x++ ?>
                                @endfor
                            </div>
                        @endfor
                        <label class="row justify-content-center col-md-2">{{ __('arrays.holder.size') }}</label>
                        <input type="text" class="form-control col-md-2" placeholder="{{$data['size']}}" name="size" value="{{ $data['size'] }}" readonly/>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">  
                        {{ __('arrays.holder.vector') }}
                    </div>
                    <div class="card-body">
                                                      
                            @for ($i = 1; $i <= $data['size']; $i++)
                                <div class="form-group col-md-1">
                                    <div class="form-row">    
                                        <label >{{ $i }}</label>
                                        <input type="text" class="form-control" placeholder="{{ old('valuev') }}" name="valuev{{$i}}" value="{{ old('valuev') }}" required/>
                                    </div>
                                </div>
                            @endfor
                        
                    </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-outline-success btn-block">{{ __('arrays.holder.calculate') }}</button>
                        </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
