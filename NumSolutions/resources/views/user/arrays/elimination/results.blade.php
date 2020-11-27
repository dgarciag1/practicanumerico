@extends('user.arrays.menu')

@section('arrays_content')
<div class="container">
    <div class="card">
        <div class="card-header">
            {{ $data["title"] }}
                <a class="btn btn-outline-info return-btn" href="{{ route('arrays.elimination.values') }}"><img src="{{ asset('/icons/arrow-return-left.svg') }}" class="delete-icon"></a>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">                     
                <div class="card">
                    <div class="card-header">
                            @if($data["error"]==false) 
                                {{ __('arrays.holder.stages') }}
                            @else
                                {{ __('arrays.holder.error') }}
                            @endif
                    </div>
                    <div class="card-body">
                        @foreach($data["results"] as $result)
                            {{ $result }}<br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection