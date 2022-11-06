@extends('layouts.app')

@section('content')
<!-- Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="confirmationModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Confirmation</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      
        <div class="modal-body">
          <p id="alertMsg">Dynamic Text</p>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-mdb-dismiss="modal">Cancel</button>
        <a type="button" id="myAnchor" class="btn btn-danger btn-sm" href="">Okay</a>
      </div>
    </div>
  </div>
</div>

    @if($errors->any())
        <div class="alert alert-success">
        <h6 style="color: red;">{{$errors->first()}}</h6>
        </div>
    @endif
    <table class="table table-bordered" style="cursor:default;">
        <tr style="cursor:default;">
            <th style="text-align: left">Room ID</th>
            <th>Category</th>
            <th>Status</th>
            <th>Rent per day</th>
            <th>Guest ID</th>
            <th>Action</th>
        </tr>
        @foreach($room_datas as $room)
        <tr>
            <td>{{$room->id}}</td>
            <td>{{$room->cetegory}}</td>
            <td>{{$room->status}}</td>
            <td>{{$room->rent_per_day}} BDT</td>
            <td><a href="/details/{{$room->booked_for}}">{{$room->booked_for}}</a></td>
            @if($room->status == "booked")
            <td><button  id="{{$room->id}}" name="edit" onclick="alertFunction(this)" class="btn btn-danger btn-sm" value="{{$room->id}}">Cancel Booking</button></td>
           @else
           <td><t/d>
            @endif
        </tr>
        @endforeach
        <tfoot>
            <tr>
                <td colspan="6" style="text-align: center">Total Room: {{count($room_datas);}} </td>
            </tr>
        </tfoot> 
        
    </table>
    @if($errors->any())
        <div class="alert alert-success">
        <h6 style="color: red;">{{$errors->first()}}</h6>
        </div>
    @endif
@endsection


@section('scriptList')
<script>  

  function alertFunction(btn){
    var sid = btn.value;
      
      $('#alertModal').modal('show');
      document.getElementById("alertMsg").innerHTML="Are You Sure?<br><br>Room id : ("+sid+") will be availeable.";
      document.getElementById("myAnchor").href ="/makeAvailable/"+sid;
    
  }
 </script>
 @endsection