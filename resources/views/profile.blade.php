@extends('layouts.masterlayout')
@section('profile','mm-active')
@section('content')

<div class="col-12">
<div class="QA_section">
<div class="app-col mb-5">
    <h4>Profile..</h4>

</div>
<div class="row">
    <div class="col-5  app-col">
<h4 class="mb-5">My Profile</h4>
     <h5>Name : <span>{{$user['name']}}</span> </h5>
     <h5>Email : <span>{{$user['email']}}</span> </h5>
    </div>
    <div class="col-6 app-col">
        <h4 class="mb-5">Change Password</h4>
 <form  class="passwordChange">
   @csrf
   <input type="hidden" value="{{$user['id']}}" name="id">
  <div class="form-group row mb-1">
    <label for="old" class="col-sm-4 col-form-label">Old Password : </label>
    <div class="col-sm-8">
      <input type="text" class="form-control"  name="old" id="old" placeholder="Old Password">
      <span id="old_error" class="text-red"></span>
      <span id="old_match_error" class="text-red"></span>
    </div>
  </div>
  <div class="form-group row mb-1">
    <label for="new" class="col-sm-4 col-form-label">New Password : </label>
    <div class="col-sm-8">
      <input type="text" class="form-control"   name="new" id="new" placeholder="New Password">
      <span id="new_error" class="text-red"></span>
    </div>
  </div>
  <div class="form-group row">
    <label for="confirm" class="col-sm-4 col-form-label">Confirm Password : </label>
    <div class="col-sm-8">
      <input type="text" class="form-control"  name="confirm" id="confirm" placeholder="Confirm Password">
      <span id="confirm_error" class="text-red"></span>
      <span id="match_error" class="text-red"></span>
    </div>
  </div>
  <div class="form-group row">
    <div class="text-end mt-3 mb-2">
      <button type="submit" class="btn btn-primary update_btn">Change</button>
    </div>
  </div>
</form>
    </div>
</div>

<script>
    
$('.passwordChange').submit(function(e) {
            e.preventDefault();
            isValid=true;
            let old = $('#old').val();
            let newpass = $('#new').val();
            let confirm = $('#confirm').val();


             if (old === "") {
            $("#old_error").html('Old Password Is Required');
            isValid = false;
            }else{
                $("#old_error").html('');
            }
             if (newpass === "") {
            $("#new_error").html('New Password Is Required');
            isValid = false;
            }else{
                $("#new_error").html('');
            }
             if (confirm === "") {
            $("#confirm_error").html('Confirm Password Is Required');
            isValid = false;
            }else{
                $("#confirm_error").html('');
            }
             if (confirm === newpass) {
                $("#match_error").html('');
            }else{
                 $("#match_error").html('New & Confirm Password Does Note Match');
            isValid = false;
            }
            
        if (isValid) {

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ route('change_password') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                  console.log(response);
                    if(response==1){   
                     $("#old_match_error").html('');
                      $(".message").val('Password Chagned').css('display', 'block').fadeOut(8000);
                    }
                   else{              
                     $("#old_match_error").html('Old Password Does Note Match');
                    }
                }
            });
        }
        });


</script>
    
@endsection