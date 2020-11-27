@extends('user.interpolation.menu')

@section('interpolation_content')
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
                                {{ __('interpolation.holder.results') }}
                            @else
                                {{ __('interpolation.holder.error') }}
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