@extends('layouts.default')
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
    $(document).ready(function(){
/*        $(".detailBox").click(function(){
             $(this).closest('td').find('complaint_id').css( "color", "red" );
             console.log("triger");
             var uid;
             uid = $(this).closest('tr').find('.complaint_id').html();
             $("#user1").val(uid);
        });*/
    });
</script>
<style> 
@import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css);

.detailBox {
    width:80%;
    border:1px solid #bbb;
    margin:50px;
}
.titleBox {
    background-color:#fdfdfd;
    padding:10px;
}
.titleBox label{
  color:#444;
  margin:0;
  display:inline-block;
}

.commentBox {
    padding:10px;
    border-top:1px dotted #bbb;
}
.commentBox .form-group:first-child, .actionBox .form-group:first-child {
    width:100%;
}
.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
    width:100%;
}
.actionBox .form-group * {
    width:100%;
}
.taskDescription {
    margin-top:10px 0;
}
.commentList {
    padding:0;
    list-style:none;
    max-height:200px;
    overflow:auto;
}
.commentList li {
    margin:0;
    margin-top:10px;
}
.commentList li > div {
    display:table-cell;
}
.commenterImage {
    width:30px;
    margin-right:5px;
    height:100%;
    float:left;
}
.commenterImage img {
    width:100%;
    border-radius:50%;
}
.commentText p {
    width:100%;
    height:100%;
}
.sub-text {
    color:#aaa;
    font-family:verdana;
    font-size:11px;
}
.actionBox {
    border-top:1px dotted #bbb;
    padding:10px;
}
</style>
@include('layouts.navbar') 
@section('content')
@foreach($user as $object)  
<div class="detailBox">
    <div class="titleBox">
      <label>Ticket </label>
    </div>
    <div class="commentBox">
            <table class="table">
                <td>        
                    <label>Name </label> 
                    <p class="taskDescription">{{$object->firstname}} {{$object->lastname}}</p>
                </td>  
                <td>
                    <label>Email</label>
                    <p class="taskDescription">{{$object->email}}</p>
                </td> 
                <tr class="complaint_id">
                 @foreach ($object->complaint as $relatedObject)
                    <td>
                        <label>Complaint ID</label>
                        <p class="taskDescription complaint_id">{{$relatedObject->id }}</p>
                    </td>  
                    <td>
                        <label> Os information</label>
                        <p class="taskDescription">{{$relatedObject->operating_system }}</p>
                    </td>  
                    <td>
                        <label> Software Issue </label>
                        <p class="taskDescription">{{$relatedObject->software_issue }}</p>
                    </td>  
                    </tr>
                    <tr>
                        <td>
                            <label> Location </label>
                            <p class="taskDescription"> {{$relatedObject->location }}</p>
                        </td> 
                    </tr>
                    <td>
                        <label> Status </label>
                        <p class="taskDescription">{{$relatedObject->status}}</p>
                    </td>  
            </table>
    </div>
    <div class="actionBox">
         @foreach ($relatedObject->comments as $secondRelated)
        <ul class="commentList">
            <li>
                <div class="commentText">
                    <p class="">{{$secondRelated->Comment}}</p> <span class="date sub-text"> >{{$secondRelated->created_at}}</span>
                </div>
            </li>
        </ul>
         @endforeach
         @endforeach
        <form  id="form1" action="/addComment" method="post" class="form-inline" role="form">
            {{ csrf_field() }}
            <table>
                <tr>
                    <td>
                        <div class="form-group">
                          <label>Complaint Id</label>
                          <input type="text" id="user1" class="form-control ID" name="complaint_id" >
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                          <label>Edit Status</label>
                          <select class="form-control" name="status">
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Resolved">Resolved</option>
                            <option value="Unresolved">Unresolved</option>
                          </select>
                        </div>
                    </td>
                </tr>    
                <tr>
                    <td>
                        <div class="form-group">
                          <label >Comment</label>
                          <textarea type="text" name="comment" placeholder="Write your comment here...." autofocus="" style="height:50px; width:100%;" class="form-control" ></textarea>
                        </div>
    
                        <div class="form-group">
                          <button type="submit" id="submit1" class="btn btn-default">Add comment</button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endforeach


@stop
