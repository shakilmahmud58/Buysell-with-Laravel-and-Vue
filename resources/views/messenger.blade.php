@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$user->username}}</div>

                <div class="card-body">
                  <textbox :to = {{ $user->id }} :from = {{auth()->user()->id}}></textbox>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection