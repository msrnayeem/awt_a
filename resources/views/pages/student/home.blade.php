@extends('layouts.app')

@section('content')
<div class="container" style="cursor:default;">
    <br>
    <div class="main-body">     
        <div class="card">
            <div class="card-body" style="background-color:cyan; height: 200px;position:fixed;">
                <div class="container">
                    
                    <label style="text-align:center;">welcome</label>
                    <label style="text-align:center;">{{$students}}</label>
                    
                
                </div>  
            </div>                        
        </div>
    </div>
</div>
        
    
 @endsection
