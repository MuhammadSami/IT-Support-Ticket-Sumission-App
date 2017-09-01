<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\User;
use App\Complaint;
use App\Comment;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    
    function addTicket(Request $req)
    {
        $this->validate($req, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'email|required',
            'software_issue' => 'required',
            'operating_system' => 'required',
            'location' => 'required',
            'comment' => 'required'
        ]);
        
        $user = new User;

        $user->firstname = $req->input('firstname');
        $user->lastname = $req->input('lastname');
        $user->email = $req->input('email');
        
        
        
        $complaint = new Complaint;
        $complaint->operating_system = $req->input('operating_system');
        $complaint->software_issue = $req->input('software_issue');
        $complaint->location = $req->input('location');
        $complaint->status = 'Pending';
        
        
        $comment = new Comment;
        $comment->Comment = $req->input('comment');
        
        $user->save();

        $user->complaint()->save($complaint);
        $complaint->comments()->save($comment);
        
        return view('pages.successSubmit', ['name' => $user->firstname, 'id' => $complaint->id]);
    }
    function addComment(Request $req, Complaint $complaint)
    {   
        $this->validate($req, [
            'complaint_id' => 'required',
            'status' => 'required',
            'comment' => 'required'
        ]);
        //updating complaint status
        $complaint::where('id', $req->input('complaint_id'))
          ->update(['status' =>  $req->input('status')]);
        //adding comments 
        $complaint->id= $req->input('complaint_id');
        $comment = new Comment();
        $comment->Comment = $req->input('comment');
        
        $complaint->comments()->save($comment);
        return redirect('/ViewAllComplaints');

    }
    function showTickets()
    {
        $user = User::with('complaint', 'complaint.comments')->get();
        return view('pages.allComplaints',['user'=> $user]);
    }
    
    function searchTicket(Request $req)
    {
        $this->validate($req,[
            'email' => 'email|required'
        ]);
        $complaint = User::where('email', $req->input('email'))->get();
        return view('pages.allComplaints', ['user'=> $complaint]);
    }
}
