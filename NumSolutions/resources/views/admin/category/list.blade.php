@extends('admin.menu')

@section('menu_content')
<div class="container">
    @if ($data["categories"]->isEmpty())
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Don't have any products</div>
                    <div class="card-body">
                        <a href="{{ route('admin.category.create') }}" class="btn btn-outline-success btn-block">Create one category</a>
                    </div>
                </div>
            </div>
        </div>
    @else

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('category.table.id') }}</th>
                                <th>{{ __('category.table.name') }}</th>
                                <th>{{ __('category.table.show') }}</th>
                                <th colspan="2">{{ __('category.table.option') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data["categories"] as $category)
                            <tr>
                                <td>{{ $category->getId() }}</td>
                                <td>{{ $category->getName() }}</td>
                                <td>{{ $category->getDescription() }}</td>
                                <td><a class="navbar-brand btn btn-outline-info btn-block" href="{{ route('admin.category.show',['id'=> $category->getId()])}}"><img src="{{ asset('/icons/file-earmark-text.svg') }}" class="delete-icon"></a></td>
                                <td><a class="navbar-brand btn btn-outline-danger btn-block" href="{{ route('admin.category.delete',['id'=> $category->getId()])}}" onclick="return confirm('{{ __('category.holder.confirm') }}')"><img src="{{ asset('/icons/trash.svg') }}" class="delete-icon"></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    @endif
</div>
@endsection
