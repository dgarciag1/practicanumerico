@extends('user.functions.menu')

@section('functions_content')
<div class="container">

    <div class="card">
        <div class="card-header">
            {{ $data["title"] }}
                <a class="btn btn-outline-info return-btn" href="{{ route('functions.bisection.values') }}"><img src="{{ asset('/icons/arrow-return-left.svg') }}" class="delete-icon"></a>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                @if($data["error"]==false)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> iter </th>
                                <th> ai </th>
                                <th> xm </th>
                                <th> bi </th>
                                <th> f(xm) </th>
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
                                <th colspan="6"><b>{{ __('functions.bisection.approximation') }}{{ $data["xm"] }}</b></th>
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