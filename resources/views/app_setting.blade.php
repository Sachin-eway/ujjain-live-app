@extends('layouts.masterlayout')
@section('mobile_app_setting','mm-active')
@section('content')

<div class="col-12">
<div class="QA_section">
<div class="app-col mb-5">
    <h4>Mobile App Settings</h4>

</div>
<div class="row">
    <div class="col-5  app-col">
<h4 class="mb-5">General Setting</h4>
 <form class="GeneralForm" enctype="multipart/form-data">
   @csrf
   <input type="hidden" name="id" value="{{$data['id']}}">
  <div class="form-group row mb-3">
    <label for="application_title" class="col-sm-4 col-form-label">Logo :</label>
    <div class="col-sm-8">
      <input type="file" id="logoInput"  name="logo" class="form-control">
                  <span id="icon_error" class="text-red"></span>
                 <img src="img/icon/{{$data['logo']}}" alt="Image Preview" id="logoPreview" >
    </div>
  </div>
  <div class="form-group row mb-3">
    <label for="application_title" class="col-sm-4 col-form-label">Application Title :</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="application_title"id="application_title" value="{{$data['application_title']}}" placeholder="Application Title">
    </div>
  </div>
  <div class="form-group row">
    <label for="meta_keywords" class="col-sm-4 col-form-label">Meta Keywords : </label>
    <div class="col-sm-8">
      <input type="text" class="form-control"  value="{{$data['meta_keywords']}}" name="meta_keywords" id="meta_keywords" placeholder="Meta Keywords">
    </div>
  </div>
  <div class="form-group row">
    <div class="text-end mt-3 mb-2">
      <button type="submit" class="btn btn-primary gerneral_btn">Update</button>
    </div>
  </div>
</form >
    </div>
    <div class="col-6 app-col">
        <h4 class="mb-5">Contact Information Setting</h4>
 <form class="ContactForm">
   @csrf
   <input type="hidden" name="id" value="{{$contact['id']}}">
  <div class="form-group row mb-3">
    <label for="number" class="col-sm-3 col-form-label">Contact Number:</label>
    <div class="col-sm-9">
      <input type="number" id="number" value="{{$contact['mobile_no']}}" name="number" placeholder="Contact Number" class="form-control">
                  <span id="number_error" class="text-red"></span>
    </div>
  </div>
  <div class="form-group row mb-3">
    <label for="email" class="col-sm-3 col-form-label">Email Address :</label>
    <div class="col-sm-9">
      <input type="email" id="email" value="{{$contact['email']}}" name="email" placeholder="Email Address" class="form-control">
                  <span id="email_error" class="text-red"></span>
    </div>
  </div>
<hr>
  <p>Social Links</p>
  <div class="form-group mb-1 row">
    <label for="facebook" class="col-sm-3 col-form-label"><i class="fa-brands fa-facebook-f"></i> Facebook : </label>
    <div class="col-sm-9">
      <input type="text" class="form-control"  value="{{$contact['facebook']}}" name="facebook" id="facebook" placeholder="https://">
    </div>
  </div>
  <div class="form-group row mb-1">
    <label for="instagram" class="col-sm-3 col-form-label"><i class="fa-brands fa-instagram"></i> Instagram : </label>
    <div class="col-sm-9">
      <input type="text" class="form-control" value="{{$contact['instagram']}}" name="instagram" id="instagram" placeholder="https://">
    </div>
  </div>
  <div class="form-group row mb-1">
    <label for="twitter" class="col-sm-3 col-form-label"><i class="fa-brands fa-twitter"></i> Twitter : </label>
    <div class="col-sm-9">
      <input type="text" class="form-control"  value="{{$contact['twitter']}}" name="twitter" id="twitter" placeholder="https://">
    </div>
  </div>
  <div class="form-group row">
    <label for="youtube" class="col-sm-3 col-form-label"><i class="fa-brands fa-youtube"></i> Youtube : </label>
    <div class="col-sm-9">
      <input type="text" class="form-control"  value="{{$contact['youtube']}}" name="youtube" id="youtube" placeholder="https://">
    </div>
  </div>
  <div class="form-group row">
    <div class="text-end mt-3 mb-2">
      <button type="submit" class="btn btn-primary update_btn">Update</button>
    </div>
  </div>
</form>
    </div>
</div>

<script>
    $('#meta_keywords').tagsInput();

    $(".GeneralForm input").focus(function(){
    $(".gerneral_btn").html('Save Change');
    });
    $(".ContactForm input").focus(function(){
    $(".update_btn").html('Save Change');
    });
$('.GeneralForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ route('update_setting') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                   $(".message").val('Update Successfully').css('display', 'block').fadeOut(8000);
                  $(".gerneral_btn").html('Update');
                }
            });
        });
$('.ContactForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ route('update_contact') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                   $(".message").val('Update Successfully').css('display', 'block').fadeOut(8000);
                  $(".update_btn").html('Update');
                }
            });
        });

</script>
    
@endsection