 @extends('plf.responsible.layout')

  @section('head')
   @include('plf.responsible.inc.head')
  @endsection
  @section('slideBar')
   @include('plf.responsible.inc.slideBar')
  @endsection
  @section('header') 
   @include('plf.responsible.inc.header')
  @endsection
  @section('sidebar') 
    @include('plf.responsible.inc.sideBar')
  @endsection @section('content')

<style>
    .carousel-inner .item {
        height: 300px;
        width: 100%;
    }
    
    .mh-110 {
        min-height: 110px!important;
    }
    
    .toolbar {
        float: right;
    }
    
    .error-input {
        text-align: center;
        color: red;
    }
    
    .info-input {
        text-align: center;
        color: gray;
    }
</style>
<div class="container">

    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <div class="form-wizard">
                    <div class="tab-content">
                        <div class="form-horizontal bordered-row">
                            <div class="tab-pane active" id="step-1">
                                <div class="col-md-12">
                                    <div class="content-box">
                                        <h3 class="content-box-header bg-white">List des demandes non encore traitées</h3>
                                        <div style="overflow-y: scroll; height:400px;" class="content-box-wrapper">
                                            <table class="table mrg0B">
                                                <thead>
                                                    <th>
                                                        Employée
                                                    </th>
                                                    <th>
                                                        Date début
                                                    </th>
                                                    <th>
                                                        Période
                                                    </th>
                                                    <th>
                                                        raison
                                                    </th>
                                                    <th>
                                                        <span class="pull-right">Action</span>
                                                    </th>
                                                </thead>
                                                <tbody>
        @foreach($leave_requests as $leave_request) 
            <tr>
              <td class="text-left size-sm">   {{$leave_request->employee->user->first_name }} {{$leave_request->employee->user->last_name }}
              </td>
              <td class="text-left size-sm">{{ date('d-M-Y', strtotime($leave_request->request_date)) }} </td>
              <td class="text-left size-sm">{{$leave_request->period }}</td>
              <td class="text-left size-sm">{{$leave_request->reason }}</td>
              <td><a href="#" class="btn view-detail" data-toggle="modal" data-target="#viewModal" data-placement="top"
               data-emp="{{$leave_request->employee->user->first_name }}&nbsp;{{$leave_request->employee->user->last_name }}"
               data-ReqDate="{{ date('d-M-Y', strtotime($leave_request->request_date)) }}"
               data-period="{{$leave_request->period }}"
               data-reason="{{$leave_request->reason }}"
               data-id="{{$leave_request->employee->id}}"
               data-leaveid="{{$leave_request->id}}"
               >aperçu</a></td>
            </tr>
        @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  @endsection
  @include('RH::leaves.viewModal')
  @section('footer') 
    @include('plf.responsible.inc.footer') 
  @endsection

  @section('scripts') 
  <script type="text/javascript">
   $('.view-detail').on('click', function(e){
   	  $('#emp').val($(this).data('emp'));
   	  $('#date-req').val($(this).data('reqdate'));
   	  $('#period').val($(this).data('period'));
   	  $('#reason').val($(this).data('reason'));
   	  $('#emp-id').val($(this).data('id'));
   	  $('#leaveid').val($(this).data('leaveid'));
   	  $('#manager-reason').val('');
   });

    $(".approuver").click(function(e){
        e.preventDefault();
         $.ajax({
           type:'GET',
           url: "{{Route('apprauverLeaveRequest')}}",
           data:{
           	 'starDate': $('#date-req').val(),
           	 'status': '1',
           	 'reason': $('#manager-reason').val() ? 'reason': ' ',
           	 'period': $('#period').val(),
           	 'emp_id': $('#emp-id').val(),
           	 'leaveReq_id': $('#leaveid').val()
           },
           success:function(data){
               location.reload();
           }
          });
    });
    $(".refuser").click(function(e){
    e.preventDefault();
      $.ajax({
           type:'GET',
           url: "{{Route('refuseLeaveRequest')}}",
           data:{
           	 'starDate': $('#date-req').val(),
           	 'status': '2',
           	 'reason': $('#manager-reason').val() ? 'reason': ' ',
           	 'period': $('#period').val(),
           	 'emp_id': $('#emp-id').val(),
           	 'leaveReq_id': $('#leaveid').val()
           },
           success:function(data){
               location.reload();
           }
          });
    });
  </script>
  @endsection