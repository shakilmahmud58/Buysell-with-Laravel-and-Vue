@extends('layouts.app')
@section('content')
<messagelist :userid={{ $user }}></messagelist>
@endsection