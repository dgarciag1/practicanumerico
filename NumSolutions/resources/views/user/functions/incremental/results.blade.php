@extends('user.functions.menu')

@section('functions_content')
<div class="container">
    <div class="card">
        <div class="card-header">
            {{ $data["title"] }}
                <a class="btn btn-outline-info return-btn" href="{{ route('functions.incremental.values') }}"><img src="{{ asset('/icons/arrow-return-left.svg') }}" class="delete-icon"></a>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">                     
                <table class="table table-striped">
                     
                    <thead>
                        <tr>
                            @if($data["error"]==false) 
                                <th>{{ __('functions.incremental.roots') }}</th>
                            @else
                                <th>{{ __('functions.holder.error') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["results"] as $result)
                                <tr>
                                    <td>{{ $result }}</td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection