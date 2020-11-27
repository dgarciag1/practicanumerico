@extends('user.arrays.menu')

@section('arrays_content')
<div class="container">
    <div class="card">
        <div class="card-header">
            {{ $data["title"] }}
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