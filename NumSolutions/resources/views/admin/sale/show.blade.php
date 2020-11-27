@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('Sale.title') }}
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Sale.quantity') }}</th>
                                <th>{{ __('Sale.total') }}</th>
                                <th>{{ __('Sale.name') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data["items"] as $item)
                                <tr>
                                    <th>{{ $item->getQuantity() }}</th>
                                    <th>{{ $item->getTotal() }}</th>
                                    <th>{{ $item->product->getName() }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection