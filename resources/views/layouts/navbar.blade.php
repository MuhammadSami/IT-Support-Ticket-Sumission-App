<style>
  .navbar-brand {
    max-width: 50%;
}
</style>


<!--This is derived from bootstrap documentation for navigation bar. https://getbootstrap.com/docs/3.3/components/#navbar-->
<nav class="navbar navbar-inverse">

  <div class="container-fluid">
      
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a class="navbar-left" href="#">
        <img alt="Brand" src="images/logo2.png" class="img-responsive" <img style="max-width:55; ">
      </a>
    </div> 

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li role="presentation"><a href="/">Home</a></li>
          <li role="presentation"><a href="/complaint">Make a Request</a></li>
          <li role="presentation" c><a href="/ViewAllComplaints">See All Complaints</a></li>
          <li role="presentation" c><a href="/findTicket">Find My Ticket</a></li>
          <li role="presentation"><a href="/faq">FAQ</a></li>
        </ul>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
