@extends('layouts.masterlayout')
@section('sub_category','mm-active')
@section('content')
{{-- modal box --}}
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sub Category Create</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <!-- Modal body -->
            <div class="ScrollStyle">
            <div class="modal-body">
            
                <form class="form" action="{{route('sub_create_category')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="" id="id">
                <input type="hidden" name="icon_old" value="" id="icon-old">
                <input type="hidden" name="img1_old" value="" id="img1-old">
                <input type="hidden" name="img2_old" value="" id="img2-old">
                <input type="hidden" name="img3_old" value="" id="img3-old">
                  <div class="mt-3">
                    <label class="mb-1" for="sub_category">Sub Category Name <span class="star-red">*</span></label>
                  <input type="text" name="sub_category" id="sub_category" class="form-control" placeholder="Category Name">
                  <span id="cat_error" class="text-red"></span>
                  </div>
                  <div class="mt-3">
                    <label class="mb-1" for="category">Parent Category Select <span class="star-red">*</span></label>
                  <select type="text" name="category" id="category" class="form-control" placeholder="Category Name">
                  <option value="">Select Category</option>

                 @foreach ($cat_data as $item )
                     <option value="{{$item->id}}">{{$item->category}}</option>
                 @endforeach
                  
                  </select>
                  <span id="parent_cat_error" class="text-red"></span>
                  </div>
                  <div class="mt-3">
                  <label class="mb-1" for="icon">Icon <span class="star-red">*</span></label>
                  <input type="file" id="imageInput"  name="icon" class="form-control">
                  <span id="icon_error" class="text-red"></span>
                   <img src="#" alt="Image Preview" id="imagePreview" >
                  </div>
                  <div class="mt-3">
                  <label class="mb-1" for="title">Title <span class="star-red">*</span></label>
                  <textarea type="text" id="title"  name="title" class="form-control"></textarea>
                  <span id="title_error" class="text-red"></span>

                  </div>
                  <div class="mt-3">
                  <label class="mb-1" for="description">Description <span class="star-red">*</span></label>
                  <textarea type="text" id="description"  name="description" class="form-control"></textarea>
                  <span id="desc_error" class="text-red"></span>

                  </div>
                <div class="mt-3">
                  <label class="mb-1" for="slider_img_1">Slider Image 1 <span class="star-red">*</span></label>
                  <input type="file" id="slider_img_1"  name="slider_img_1" class="form-control">
                  <span id="img1_error" class="text-red"></span>
                  <img src="#" alt="Image Preview" id="img1Preview" >
                  </div>
                <div class="mt-3">
                  <label class="mb-1" for="slider_img_2">Slider Image 2 <span class="star-red">*</span></label>
                  <input type="file" id="slider_img_2"  name="slider_img_2" class="form-control">
                   <span id="img2_error" class="text-red"></span>
                   <img src="#" alt="Image Preview" id="img2Preview" >
                  </div>
                <div class="mt-3">
                  <label class="mb-1" for="slider_img_3">Slider Image 3 <span class="star-red">*</span></label>
                  <input type="file" id="slider_img_3"  name="slider_img_3" class="form-control">
                   <span id="img3_error" class="text-red"></span>
                   <img src="#" alt="Image Preview" id="img3Preview" >
                  </div>
                  </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">                
                <button type=" submit" class="btn btn-primary submit_btn">Save</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            
        </div>
    </div>
</div>

{{-- /modal box --}}

<div class="col-12">
<div class="QA_section">
<div class="white_box_tittle list_header cat-col ">
<h4>Sub Categorys</h4>
<div class="box_right d-flex lms_block">

<div class="add_button ms-2">
<button type="button" class="btn  btn_1" data-bs-toggle="modal" data-bs-target="#myModal">
    Add Sub Category
</button>
</div>
</div>
</div>
<div class="QA_table mb_30">

<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><table class="table lms_table_active dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1031px;">
<thead>
<tr role="row">
    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 110px;" aria-label="Category: activate to sort column ascending">Category</th>
    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 110px;" aria-label="Category: activate to sort column ascending">Parent Category</th>
    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 111px;" aria-label="Teacher: activate to sort column ascending">Icon</th>
    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 111px;" aria-label="Teacher: activate to sort column ascending">slider-1</th>
    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 111px;" aria-label="Teacher: activate to sort column ascending">slider-2</th>
    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 111px;" aria-label="Teacher: activate to sort column ascending">slider-3</th>
    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 105px;" aria-label="Lesson: activate to sort column ascending">Status</th>
    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 72px;" aria-label="Enrolled: activate to sort column ascending">Action</th>
</tr>
</thead>
<tbody>
  @foreach ($data as $item )
<tr role="row" class="odd">
<td> {{$item->sub_category}}</td>
<td> {{$item->category}}</td>
<td> <img src="public/img/icon/{{$item->icon}}" width="155px"></td>
<td> <img src="public/img/slider/{{$item->slider_img_1}}" width="155px"></td>
<td> <img src="public/img/slider/{{$item->slider_img_2}}" width="155px"></td>
<td> <img src="public/img/slider/{{$item->slider_img_3}}" width="155px"></td>
<td>
   @if ($item->status==1)
       <input type="button" onclick="Status({{$item->id}})" class="status_active statusBTN_{{$item->id}}" value="active">
   @else
       <input type="button" onclick="Status({{$item->id}})" class="status_de statusBTN_{{$item->id}}" value="Deactive">
   @endif

  </td>
<td class="d-flex gap-1">
  <button class="noselect1" data-bs-toggle="modal" onclick="cat_edit({{$item->id}})" data-bs-target="#myModal"><span class="text">Edit</span><span class="icon"><i class="fas fa-edit "></i></span></button>
  <a  href="{{route('sub_delete_category',$item->id)}}" class="noselect" onclick="return confirm('Are you sure you want to delete this item?');"><span class="text">Delete</span><span class="icon"><i class="fa fa-trash" aria-hidden="true"></i></span></a>

  </td>
</tr>
@endforeach
</tbody>
 </table>

</div>
</div>
</div>




</div>






</div>
<script>
    //validation 
 $(".form").submit(function(event) {
        event.preventDefault();
 var isValid = true;
 var category = $("#category").val();
 var subcategory = $("#sub_category").val();
 var oldicon = $("#icon-old").val();
 var title = $("#title").val();
 var desc = $("#description").val();
 var fileInput = document.getElementById("imageInput");    
 var selectedFile = fileInput.files[0];
 var slider1 = document.getElementById("slider_img_1");    
 var slider1File = slider1.files[0];
 var slider2 = document.getElementById("slider_img_2");    
 var slider2File = slider2.files[0];
 var slider3 = document.getElementById("slider_img_3");    
 var slider3File = slider3.files[0];


        if (subcategory === "") {
            $("#cat_error").html('Category is required');
            isValid = false;
        }else{
             $("#cat_error").html('');
        }
        if (category === "") {
            $("#parent_cat_error").html('Parent Category is required');
            isValid = false;
        }else{
             $("#parent_cat_error").html('');
        }
        if (desc === "") {
            $("#desc_error").html('Description is required');
            isValid = false;
        }else{
             $("#desc_error").html('');
        }
        if (title === "") {
            $("#title_error").html('title is required');
            isValid = false;
        }else{
             $("#title_error").html('');
        }

        if (!selectedFile && oldicon==='') {
            $("#icon_error").html('Icon is required');
            isValid = false;
        } else{
             $("#icon_error").html('');
        }
        if (!slider1File && oldicon==='') {
            $("#img1_error").html('Image is required');
            isValid = false;
        } else{
             $("#img1_error").html('');
        }
        if (!slider2File && oldicon==='') {
             $("#img2_error").html('Image is required');
            isValid = false;
        } else{
             $("#img2_error").html('');
        }
        if (!slider3File && oldicon==='') {
            $("#img3_error").html('Image is required');
            isValid = false;
        } else{
             $("#img3_error").html('');
        }

        if (isValid) {
            this.submit();
        }
    });

//status change
   function Status(id) {
        var ans = confirm("Are you sure you want to Chnage Status this Record?");
        if (ans) {
            $.ajax(
                {
                    url: "sub_cat_status/" + id,
                    type: 'get',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                                              $("#loading-image").show();
                                          },
                    success: function (data) {             
                                
                              if(data==1){
                                $('.statusBTN_'+id).css('background','#0cd305').val("Active")
                             }else{
                                 $('.statusBTN_'+id).css('background','#d30505').val("Deactived")
                              }        
                    }
                });
        }
   
    }
//edit form 
function cat_edit(id){
    console.log(id);
    $('.modal-title').html('Sub Category Update');
    $('.submit_btn').html('Update');
    $('.form').attr("action","{{route('sub_update_category')}}")

     $.ajax(
        {
            url: "sub_cat_edit/" + id,
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                                        $("#loading-image").show();
                                    },
            success: function (data) {    
                        $('#sub_category').val(data.sub_category);
                        $("#category option[value='" + data.category_id + "']").prop("selected", "selected");
                        $('#icon-old').val(data.icon)
                        $('#img1-old').val(data.slider_img_1)
                        $('#img2-old').val(data.slider_img_2)
                        $('#img3-old').val(data.slider_img_3)
                        $('#title').val(data.title)
                        $('#description').val(data.Description)
                        $('#id').val(data.id)
                        
                        $('#imagePreview').css('display','block').attr('src','img/icon/'+data.icon);                    
                        $('#img1Preview').css('display','block').attr('src','img/slider/'+data.slider_img_1);                    
                        $('#img2Preview').css('display','block').attr('src','img/slider/'+data.slider_img_2);                    
                        $('#img3Preview').css('display','block').attr('src','img/slider/'+data.slider_img_3);                    
            }
        });
}


// Function to hide the edit form val
function cat_create() {
    $('.modal-title').html('Sub Category Create');
    $('.submit_btn').html('Save');
    $('.form').attr("action","{{route('sub_create_category')}}")
    $("#imagePreview").hide();
    $("#img1Preview").hide();
    $("#img2Preview").hide();
    $("#img3Preview").hide();
}
    $('#myModal').on('show.bs.modal', cat_create );
  

</script>
    
@endsection