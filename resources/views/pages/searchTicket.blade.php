@extends('layouts.default')
@include('layouts.navbar')
@section('content')
<form action="/searchTicket" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="serach">Search</label>
    <input type="text" class="form-control" id="ticket1" name="email" placeholder="Email@example.com">
  </div>
  <div class="form-group">
    <p class="help-block">Click on search to look for your Ticket</p>
  </div>
  <button type="submit" class="btn btn-default">Search</button>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@stop
