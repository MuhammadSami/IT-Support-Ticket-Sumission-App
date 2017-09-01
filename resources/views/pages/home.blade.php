@extends('layouts.default')

@include('layouts.navbar')


@section('content')
   <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Sami & Ryan's ITS Helpdesk</h1>
      <p>
      Here you will be able to submit any complaints and feedback for our system. 
      Make your requests and we will get back to you within one or two business days. </p>
      <div class="container">
        <a class="btn btn-primary"href="/complaint">Make a request</a>
        <a class="btn btn-primary"href="/ViewAllComplaints">Find your request</a>
        <a class="btn btn-primary"href="/faq">Frequently Asked Questions</a>
      </div>
</div>
@stop