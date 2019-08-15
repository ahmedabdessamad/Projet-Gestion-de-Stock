<?php

namespace App\Modules\RH\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Modules\RH\Models\LeaveRequest;
use App\Modules\RH\Models\Leave;
use App\Modules\RH\Models\AnnualLeave;
use DB;
use Alert;
use Illuminate\Support\Facades\Input;


class RequestLeavesController extends Controller
{

  /**
  * show employee leaves request
  */
  public function showLeaveRequest()
  {
  	return view('RH::leaves.list', [
      'leave_requests' => LeaveRequest::where('status' ,0)->get()
  	]);
  }

  /**
  * apprauve leave request for one employee
  */
  public function apprauverLeaveRequest(Request $request)
  {
  	$Input = $request->all();
  	$stardate = date('Y-m-d', strtotime($Input['starDate']));
  	$enddate = strtotime(date("Y-m-d", strtotime($Input['starDate'])) . " +".$Input['period']." day");  
  	Leave::create([
      'start_date'=> $stardate,
      'end_date' => date('Y-m-d', $enddate),
      'status' => $Input['status'],
      'reason' => $Input['reason'],
      'employee_id' => $Input['emp_id'],
      'leave_request_id' => $Input['leaveReq_id']
  	]);
  	LeaveRequest::where('id', $Input['leaveReq_id'])
          ->update(['status' => 1]);
    $annuelLeave = AnnualLeave::where('employee_id', $Input['emp_id'])->first();
    $banlance  = $annuelLeave->balance;
    AnnualLeave::where('employee_id', $Input['emp_id'])
          ->update(['balance' => ($banlance - $Input['period']) ]);
    return back();
  }

  /**
  * refuse leave request
  */
  public function refuseLeaveRequest(Request $request)
  {
  	$Input = $request->all();
  	$stardate = date('Y-m-d', strtotime($Input['starDate']));
  	$enddate = strtotime(date("Y-m-d", strtotime($Input['starDate'])) . " +".$Input['period']." day");  
  	Leave::create([
      'start_date'=> $stardate,
      'end_date' => date('Y-m-d', $enddate),
      'status' => $Input['status'],
      'reason' => $Input['reason'],
      'employee_id' => $Input['emp_id'],
      'leave_request_id' => $Input['leaveReq_id']
  	]);
  	LeaveRequest::where('id', $Input['leaveReq_id'])
          ->update(['status' => 2]);
    return back();
  }

  /**
  * show add group leave
  */
  public function showaddGroupLeave()
  {
    return view('RH::leaves.addGroupeLeave');
  }

  /**
  * handle group leave
  */
  public function handleaddGroupLeave(Request $request)
  {
       $data = $request->all();
       $rules = [
           'period' => 'required',      
       ];
   
       $messages = [
        'period.required' => 'la periode est obligatoire', 
       ];
   
       $validation = Validator::make($data, $rules, $messages);
   
       if ($validation->fails()) {
           return redirect()->back()->withErrors($validation->errors());
         }
    $annuelLeaves = AnnualLeave::all();
    foreach($annuelLeaves as $annuleave){
     $banlance  = $annuleave->balance;
     AnnualLeave::where('id', $annuleave->id)
          ->update(['balance' => ($banlance - $data['period']) ]);	
    }
    Alert::success('Bien !', 'le congé du groupe a été effectuée avec succes ')->persistent('Fermer');
    return back();
  }

}