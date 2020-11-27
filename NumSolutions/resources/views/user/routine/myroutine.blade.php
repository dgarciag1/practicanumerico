@extends('user.routine.menu')

@section('routine_content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>{{ __('routine.table.id') }}</th>
                  <th>{{ __('routine.table.name') }}</th>
                  <th>{{ __('routine.table.show') }}</th>
                  <th colspan="2">{{ __('routine.table.option') }}</th>                  
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>{{ $data["routines"]->getId() }}</td>
                  <td>{{ $data["routines"]->getName() }}</td>
                  <td>{{ $data["routines"]->getDescription() }}</td>
                  <td><a class="navbar-brand btn btn-outline-info btn-block" href="{{ route('user.routine.show',['id'=> $data['routines']->getId()])}}"><img src="{{ asset('/icons/file-earmark-text.svg') }}"></a></td>                 
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
