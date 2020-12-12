@extends('layouts.app')
@section('content')

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
             <div class="card-header">Message List</div>
             <div id="app" class="card-body">
                @foreach($data as $data)
                         <example-component :message={{ $data->user }}></example-component>
                         <br>
                @endforeach  
                <!-- @foreach(Auth::user()->unreadNotifications as $x)
                {{ $x->data['value'] }}
                @endforeach        -->
             </div>
         </div>
        </div>
      </div>
   </div>
@endsection