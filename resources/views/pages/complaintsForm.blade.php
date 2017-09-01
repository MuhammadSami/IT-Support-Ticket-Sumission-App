@extends('layouts.default')
@include('layouts.navbar')
@section('content')
<form action="/addTicket" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="Email1" name="email" placeholder="Email" >
  </div>
  <div class="form-group">
    <label for="Name">First Name</label>
    <input type="text" class="form-control" id="Name1" name="firstname" placeholder="First Name" >
  </div>
  <div class="form-group">
    <label for="Name">Last Name</label>
    <input type="text" class="form-control" id="Name2" name="lastname" placeholder="Last Name" >
  </div>
    <div class="form-group">
    <label>Select the OS</label>
    <select name="operating_system">
      <option value="Microsoft Windows">Microsoft Windows</option>
      <option value="Mac OSX">Mac OSX</option>
      <option value="Linux">Linux</option>
      <option value="Other">Other</option>
    </select>
  </div>
  <div class="form-group">
    <label>Software Issue</label>
    <input type="text" class="form-control" name="software_issue" placeholder="Describe the Software issue in one sentence...." >
  </div>
  <div class="form-group">
    <label>Location</label>
    <input type="text" class="form-control" name="location" placeholder="Enter Location (80.10.12)" >
  </div>
  <div class="form-group">
    <label >Comment</label>
    <textarea type="text" name="comment" placeholder="Describe Complaint Here...."  autofocus="" style="height:200px;" class="form-control" ></textarea>
  </div>
  <div class="form-group">
    <p class="help-block">Click on submit to send your complaint through</p>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
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
