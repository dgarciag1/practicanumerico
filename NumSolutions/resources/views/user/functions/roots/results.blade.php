@extends('user.functions.menu')

@section('functions_content')
<div class="container">

    <div class="card">
        <div class="card-header">
            {{ $data["title"] }}
                <a class="btn btn-outline-info return-btn" href="{{ route('functions.roots.values') }}"><img src="{{ asset('/icons/arrow-return-left.svg') }}" class="delete-icon"></a>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                @if($data["error"]==false)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> iter </th>
                                <th> xi </th>
                                <th> f(xi) </th>
                                <th> E </th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($data["results"] as $result)
                                <tr>
                                    <?php $values = explode(",", $result) ?>
                                    @foreach($values as $value) 
                                        <td>{{ $value }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            <tr>
                                <th colspan="4"><b>{{ __('functions.roots.approximation') }}{{ $data["xm"] }}</b></th>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('functions.holder.error') }}</th>
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
                @endif
            </div>
        </div>
    </div>
</div>
@endsection