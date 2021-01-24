@extends('layouts.app')
@section('content')

<shownoti :user= {{ $user ? $user:0 }}></shownoti>
@endsection