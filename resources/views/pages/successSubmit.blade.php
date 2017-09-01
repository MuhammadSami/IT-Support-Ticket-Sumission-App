@extends('layouts.default')
@include('layouts.navbar')
@section('content')
<p> Hi <b>{{$name}}</b>, your ticket number is <b>{{$id}}</b></p>
@stop