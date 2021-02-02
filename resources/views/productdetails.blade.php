@extends('layouts.app')
@section('content')

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
             <div class="card-header">Product Details</div>
              <div id="app" class="card-body">
              <div style="display:flex; flex-wrap:wrap">
              <div><img src="{{ $data->image }}"  width="250px" height="270px"></div>
              <div style="margin-left:40px; padding-top:20px">
              <p><span style="font-weight:bold">Product Name : </span>{{ $data->name }}</p>
			        <p><span style="font-weight:bold">Available Color : </span>{{ $data->color }}</p>
              <p class=""><span style="font-weight:bold">Short Description : </span>{{ $data->description }}</p>
              <p><span style="font-weight:bold">Product Type : </span></p>
              <p><span style="font-weight:bold">Price : </span>{{ $data->price }}</p>
			        <p><span style="font-weight:bold">Rating : </span>{{ $data->rating }}</p>
              <!-- @if(auth()->user()->id!==$data->user->id) -->
               Uploaded By : <example-component :message={{ $data->user }}></example-component>
               <!-- @endif -->
             </div>
             </div>
             <!-- <broad :id={{ $data->id }}></broad> -->
             <div class="pt-4 pl-4">
                <p style="font-weight:bold">Reviews for this product</p>
                <!-- @if($user)                
                <review :productid={{ $data->id }}></review>
                @else
                <h6>You must have to <a href="/login">login</a> first</h6>
                @endif -->
                <review :productid={{ $data->id }} :userid={{$user?$user->id:0}}></review>
             </div>
             </div>
         </div>
        </div>
      </div>
   </div>
@endsection
