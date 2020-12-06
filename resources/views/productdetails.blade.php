@extends('layouts.app')
@section('content')

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
             <div class="card-header">Product Details</div>
              <div id="app" class="card-body">
              <p style="float:left;clear:both;"><img src="{{ $data->image }}" width="200px" height="260px"></p>
              <div style="text-align:left;margin-left:300px;border-left:solid black 1px;padding-left:15px;padding-top:30px">
              <p><span style="font-weight:bold">Product Name : </span>{{ $data->name }}</p>
			  <p><span style="font-weight:bold">Available Color : </span>{{ $data->color }}</p>
              <p class=""><span style="font-weight:bold">Short Description : </span>{{ $data->description }}</p>
              <p><span style="font-weight:bold">Product Type : </span></p>
              <p><span style="font-weight:bold">Price : </span>{{ $data->price }}</p>
			  <p><span style="font-weight:bold">Rating : </span>{{ $data->rating }}</p>
               Uploaded By : <example-component :message={{ $data->user }}></example-component>
             </div>
             <div class="pt-4 pl-5">
                <p style="font-weight:bold">Reviews for this product</p>
                @if($user)                
                <review :productid={{ $data->id }}></review>
                @else
                <h6>You must have to <a href="/login">login</a> first</h6>
                @endif
             </div>
             </div>
         </div>
        </div>
      </div>
   </div>
@endsection
