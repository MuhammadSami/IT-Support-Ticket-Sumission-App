<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TicketController extends Controller
{
    //
    function addComplaint(Request $req)
    {
        $issue = $req->input('issue_type');
        $device = $req->input('device');
        $location = $req->input('location');
        $complainDesc = $req->input('complain_description');
        $status = 'pending';
        
        $data = array('issue_type'=>$issue, 'device'=>$device, 'location'=>$location,
                    'complain_description'=>$complainDesc, 'status'=>$status);
        
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \DB::table('tickets')->insert($data);
        
        echo "ticket was successfully Submitted";
    }
}
