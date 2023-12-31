@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            
                                            <li class="breadcrumb-item active">Add News Post</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add News Post</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
  
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                         
    <form id="myForm" method="post" action="{{ route('update.news.post') }}" enctype="multipart/form-data">
    	@csrf 
    	
        <input type="hidden" value="{{ $newsPost->id }}" name="id">

        <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">Category Name </label>
               <select name="category_id" class="form-select" id="category_id">
                <option>Select Category </option>
                @foreach($categories as $category)
                <option @selected($newsPost->category_id === $category->id) value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
            </div>

             <div class="form-group col-md-6 mb-3">
                <label for="inputEmail4" class="form-label"> Sub Category </label>
               <select name="subcategory_id" class="form-select" id="subcategory_id">
               <option value="">Select Subcategory</option>
               @if($newsPost->subcategory_id===null)
               @else
                @foreach($subcategories as $subcategory)
                <option @selected($newsPost->subcategory_id === $subcategory->id) value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                @endforeach
                @endif
            </select>
            </div>


             <div class="form-group col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">Writer  </label>
                <select name="user_id" class="form-select" id="example-select">
                <option>Select Writer </option>
                @foreach($adminuser as $user)
                <option @selected($newsPost->user_id === $user->id) value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            </div>


             <div class="form-group col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">News Title  </label>
                <input  type="text" name="news_title" class="form-control" value="{{ $newsPost->news_title }}" >
            </div>

             <div class="form-group col-md-6 mb-3">
          <label for="example-fileinput" class="form-label">News Post Photo</label>
        <input type="file" name="image" id="image" class="form-control">
            </div>

             <div class="form-group col-md-6 mb-3">
                <label for="example-fileinput" class="form-label"> </label>

        <img id="showImage" src="{{ url( $newsPost->image) }} " class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
            </div>



 <div class="col-12 mb-3">
     <label for="inputEmail4" class="form-label">News Details  </label>
            <textarea name="news_details">
               {{ $newsPost->news_details }} </textarea>    
            </div>

            <div class="form-group col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">Tags  </label>
               {{--  @php
                    $allTag='';
                @endphp
                @foreach($tags as $tag)
                @php
                    $allTag .= $tag->name . ',';
                    
                @endphp
                 
                @endforeach --}}
                <input type="text" name="tags" class="selectize-close-btn" value="{{ $existingTags }}">
             
             
               
            </div>



    <div class="row">
        <div class="col-lg-6">
            <div class="form-check mb-2 form-check-primary">
                <input @checked($newsPost->breaking_news) class="form-check-input" type="checkbox" name="breaking_news" value="1" id="customckeck1">
                
                <label class="form-check-label" for="customckeck1">Breaking News</label>
            </div>

            <div class="form-check mb-2 form-check-primary">
                <input @checked($newsPost->top_slider) class="form-check-input" type="checkbox" value='1' name="top_slider" id="customckeck2">

                <label class="form-check-label" for="customckeck2">Top Slider</label>
            </div>
            
        </div>




             <div class="col-lg-6">
           <div class="form-check mb-2 form-check-danger">
            <input  @checked($newsPost->first_section_three)  class="form-check-input" name="first_section_three" type="checkbox" value="{{ true }}" id="customckeck3">

            <label class="form-check-label" for="customckeck3">First Section Three</label>
        </div>

            <div class="form-check mb-2 form-check-danger">
            <input @checked($newsPost->first_section_nine) class="form-check-input"  name="first_section_nine" type="checkbox" value="{{ true }}" id="customckeck4" >
            <label class="form-check-label" for="customckeck4">First Section Nine</label>
        </div>
            
        </div>
        
    </div>

 

             
        </div>
 
                                          

   <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>

                                        </form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

 
                        
                    </div> <!-- container -->

                </div> <!-- content -->

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                news_title: {
                    required : true,
                }, 
            },
            messages :{
                news_title: {
                    required : 'Please Enter News Title',
                }, 
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>



<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

 
    <script type="text/javascript">

  $(document).on('change','#category_id',function(){
    var category_id = $(this).val();
    $.ajax({
        url : "{{ url('/subcategory/ajax') }}/"+category_id,
        type:'GET',
        data:{category_id:category_id},
        dataType:"json",
        success:(response)=>{
            let option = `<option>Select Category</option>`;
            $.each(response, function(key,value){
                option+= `<option value="${value.id}">${value.subcategory_name}</option>`
            })
            $('#subcategory_id').html(option);
        }
    })
  })
      /*   $(document).ready(function(){
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/"+category_id,
                        type: "GET",  
                        dataType: "json", 
                        success:function(data){
                            $('select[name="subcategory_id"]').html('');
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'"> ' + value.subcategory_name + '</option>');
                            });
                        },
                    });
                } else{
                    alert('danger');
                }
            });
        }); */
        
    </script>

@endsection 