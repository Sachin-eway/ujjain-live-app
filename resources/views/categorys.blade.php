@extends('layouts.masterlayout')
@section('category','mm-active')
@section('content')
{{-- modal box --}}
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Category Create</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form class="form" action="{{route('create_category')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="" id="id">
                <input type="hidden" name="icon-old" value="" id="icon-old">
                  <div class="mt-3">
                    <label class="mb-1" for="category">Category Name <span class="star-red">*</span></label>
                  <input type="text" name="category" id="category" class="form-control" placeholder="Category Name">
                  <span id="cat_error" class="text-red"></span>
                  </div>
                  <div class="mt-3">
                  <label class="mb-1" for="icon">Icon <span class="star-red">*</span></label>
                  <input type="file" id="imageInput"  name="icon" class="form-control">
                  <span id="icon_error" class="text-red"></span>
                   <img src="#" alt="Image Preview" id="imagePreview" >
                  </div>
                  
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">                
                <button type="submit" class="btn btn-primary submit_btn">Save</button>
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
<h4>Categorys</h4>
<div class="box_right d-flex lms_block">

<div class="add_button ms-2">
<button type="button" class="btn  btn_1" data-bs-toggle="modal" data-bs-target="#myModal">
    Add Category
</button>
</div>
</div>
</div>
<div class="QA_table mb_30">

<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><table class="table lms_table_active dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1031px;">
<thead>
<tr role="row"><th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 110px;" aria-label="Category: activate to sort column ascending">Category</th><th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 111px;" aria-label="Teacher: activate to sort column ascending">Icon</th><th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 105px;" aria-label="Lesson: activate to sort column ascending">Status</th><th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 72px;" aria-label="Enrolled: activate to sort column ascending">Action</th></tr>
</thead>
<tbody>
  @foreach ($data as $item )
<tr role="row" class="odd">
<td> {{$item->category}}</td>
<td> <img src="img/icon/{{$item->icon}}" width="155px"></td>
<td>
   @if ($item->status==1)
       <input type="button" onclick="StatusCng({{$item->id}})" class="status_active statusBTN_{{$item->id}}" value="active">
   @else
       <input type="button" onclick="StatusCng({{$item->id}})" class="status_de statusBTN_{{$item->id}}" value="Deactive">
   @endif

  </td>
<td class="d-flex gap-1">
  <button class="noselect1" data-bs-toggle="modal" onclick="cat_edit({{$item->id}})" data-bs-target="#myModal"><span class="text">Edit</span><span class="icon"><i class="fas fa-edit "></i></span></button>
  <a  href="{{route('delete_category',$item->id)}}" class="noselect" onclick="return confirm('Are you sure you want to delete this item?');"><span class="text">Delete</span><span class="icon"><i class="fa fa-trash" aria-hidden="true"></i></span></a>

  </td>
</tr>
@endforeach
</tbody>
 </table>

</div>
</div>
</div>




</div>
<script>
 $(".form").submit(function(event) {
        event.preventDefault();
 var isValid = true;
 var category = $("#category").val();
 var oldicon = $("#icon-old").val();
 var fileInput = document.getElementById("imageInput");    
 var selectedFile = fileInput.files[0];


        if (category === "") {
            $("#cat_error").html('Category is required');
            isValid = false;
        }else{
             $("#cat_error").html('');
        }

        if (!selectedFile && oldicon==='') {
            $("#icon_error").html('Icon is required');
            isValid = false;
        } else{
             $("#icon_error").html('');
        }

        if (isValid) {
            this.submit();
        }
    });


   function StatusCng(id) {
        var ans = confirm("Are you sure you want to Chnage Status this Record?");
        if (ans) {
            $.ajax(
                {
                    url: "cat_status/" + id,
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
    $('.modal-title').html('Category Update');
    $('.submit_btn').html('Update');
    $('.form').attr("action","{{route('update_category')}}")

     $.ajax(
        {
            url: "cat_edit/" + id,
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                                        $("#loading-image").show();
                                    },
            success: function (data) {    
              console.log(data)         
                        $('#category').val(data.category);
                        $('#icon-old').val(data.icon)
                        $('#id').val(data.id)
                        $('#imagePreview').css('display','block').attr('src','img/icon/'+data.icon);                    
            }
        });
}


// Function to hide the edit form val
function cat_create() {
    $('.modal-title').html('Category Create');
    $('.submit_btn').html('Save');
    $('.form').attr("action","{{route('create_category')}}")
    $("#imagePreview").hide();
}
    $('#myModal').on('show.bs.modal', cat_create );
  

</script>
    
@endsection