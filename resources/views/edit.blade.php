@extends('layouts.master')
@section('content')
        <div class="container">
            <center><h5>Edit Participants</h5></center><hr>
            <div id="disp_error"  class="alert alert-danger" style="display: none;"></div>
            <ul>
            @foreach($errors->all() as $e)
                <li>{{$e}}</li>
            @endforeach
            </ul>
            <form name="getDetails" id="getDetails" action="../edit_participant/{{$users->id}}"  class="form-inline" method="POST">
                @method('PUT');
                <div class="row">
                    <div class="form-group search-filter">
                        <label class="form-label">Name: &nbsp;</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$users->name}}" required/>
                    </div>
                    <div class="form-group search-filter">
                        <label class="form-label">Age: &nbsp;</label>
                        <input type="text" name="age" id="age" class="form-control" value="{{$users->age}}" required/>
                    </div>
                    
                    <div class="form-group search-filter">
                        <label class="form-label" >DOB: &nbsp;</label>
                        <input type="text" class="datepicker form-control" name="dob" id="dob" autocomplete="off" value="{{$users->DOB}}" required/>   
                    </div>
                </div>
                <div class="row">
                    <div class="form-group search-filter">
                        <label class="form-label" >Locality : &nbsp;</label>
                        <input type="text" class="form-control" name="locality" id="locality" autocomplete="off" value="{{$users->locality}}" required/>
                    </div>
                    <div class="form-group search-filter">
                        <label class="form-label" >Number Of Guest : &nbsp;</label>
                        <input type="text" class="form-control" name="no_of_guest" id="no_of_guest" autocomplete="off" value="{{$users->no_of_guest}}" required/>  
                    </div>
                 </div>   
                <div class="row">
                    <div class="form-group search-filter">
                        <label class="form-label">Profession: &nbsp;</label>
                        <select name="profession" class="form-control" id="profession">
                            <option  value="">Select Profession</option>
                            <option  value="student" {{ $users->profession  == 'student' ? 'selected=selected' : ""}}>Student</option>
                            <option  value="employee" {{ $users->profession  == 'employee' ? 'selected=selected' : ""}}>Employee</option>
                        </select>
                    </div>
                    <div class="form-group search-filter">
                        <label class="form-label" >Address : &nbsp;</label>
                        <textarea class="form-control" rows="5" cols="50" id="address" name="address" required maxlength="50">{{$users->address}}</textarea>
                    </div>
                    <div class="form-group search-filter">
                        <button id="update" class="btn"> Update </button>
                    </div>
                    
                </div>
                 {{ csrf_field() }}
            </form>
            <a href="../participants" class="btn" >Back</a>
        </div>
@stop
@section('custom_js')
<script type="text/javascript">
    

    $(document).ready(function(){
        $('#sidenavToggler').click();

        
        $( ".datepicker" ).datepicker({
             dateFormat: 'yy-mm-dd',
              maxDate:  new Date(2013, 0, 31)
        });

        $("#update").click(function(e){
            e.preventDefault();

            $("#disp_error").hide();
            $("#disp_error").html('');

            var submit_flag = true;
            var error = '';
            var _token = $("input[name='_token']").val();
            var name = $("#name").val();
            var age = $("#age").val();
            var dob = $("#dob").val();
            var locality = $("#locality").val();
            var no_of_guest = $("#no_of_guest").val();
            var address = $("#address").val()
            var profession = $.trim($( "#profession" ).val());


            var regex = /^[a-zA-Z ]*$/;
            var pattern =/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/;
            var digit_pattern =/^[0-9]*$/;

            error = "<ul>";
            if(!regex.test(name.trim()) || name.trim() == ''){
                
                error = "<li>Please Enter Your Name</li>";
                submit_flag = false;
            }

            if((age < 0 || age > 200) || (age.trim() == '') || !digit_pattern.test(age)) {
                error += "<li>Please Enter Proper Age</li>";
                submit_flag = false;
            }  

             

            if(!pattern.test(dob)){
                error += "<li>Please Select Proper DOB</li>";
                submit_flag = false;
            } 

                    
            if(!regex.test(locality.trim())  || locality.trim() == ''){
                error += "<li>Please Enter Locality</li>";
                submit_flag = false;
            } 

            if(no_of_guest > 3 || no_of_guest.trim() == '' || !digit_pattern.test(no_of_guest)) {
                error += "<li>Please Enter Proper Number Of Guest</li>";
                submit_flag = false;
            } 
            
            if(profession == ''){
                error += "<li>Please Select Profession</li>";
                submit_flag = false;
            }
            if(address.trim() == ''){
                error += "<li>Please Enter Proper Address</li>";
                submit_flag = false;
            }
            error += "</ul>";

            if(error != '' && !submit_flag){
                $("#disp_error").html(error);
                $("#disp_error").show();
            }
            if(submit_flag){
                $("#getDetails").submit();
            }
            
        });
        

    });
</script>
@stop
