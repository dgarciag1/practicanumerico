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
                                {{ __('arrays.holder.jacobiResults') }}
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
                @if($data["error"]==false) 
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> iter </th>
                                    <th> E </th>
                                    <th>   </th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($data["iters"] as $iter)
                                    <tr>
                                        <?php $values = explode(",", $iter) ?>
                                        @foreach($values as $value) 
                                            <td>{{ $value }}</td>
                                        @endforeach
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