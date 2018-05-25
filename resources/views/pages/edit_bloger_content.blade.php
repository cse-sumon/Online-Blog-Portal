@extends('master')
@section('main_content')

<script type="text/javascript">
	function blogvalidateForm(){
		var blog_title=document.myForm.blog_title.value;
		var category_id=document.myForm.category_id.value;
		var blog_short_description=document.myForm.blog_short_description.value;
		var blog_long_description=document.myForm.blog_long_description.value;
		var blog_image=document.myForm.blog_image.value;
		if(blog_title==""){
			document.getElementById('erbt').innerHTML="Required*";
			return false;
		}
		if(category_id=="-1"){
			document.getElementById('erct').innerHTML="Required*";
			return false;
		}

		if(blog_short_description==""){
			document.getElementById('erbsd').innerHTML="Required*";
			return false;
		}
		if(blog_long_description==""){
			document.getElementById('erbld').innerHTML="Required*";
			return false;
		}
		if(blog_image==""){
			document.getElementById('erbi').innerHTML="Required*";
			return false;
		}

	}


</script>


<!-- start: Content -->
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="#">Bloger Form</a>
		<i class="icon-angle-right"></i> 
	</li>

</ul>


<h3 style="color:green">
	<?php 
	echo Session::get('message');
	Session::put('message','');
	  
	?>


</h3>
<?php
if(Auth::user()==NULL)
	{?>
		<h3>You have to login First to Write here..... <a href="{{URL::to('/login')}}">Login</a></h3>



		<?php }


		else{ ?>
		<form name="myForm"  onsubmit="return blogvalidateForm();" method="post" action="{{URL::to('/update-bloger-content')}}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="bloger_id" value="{{ Auth::user()->id }}">
			<input type="hidden" name="blog_id" value="{{$blog_info->blog_id }}">

			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Blog Title</label>
				<div class="col-sm-10">
					<input type="text" name="blog_title" class="form-control" id="inputEmail3" placeholder="Blog Title" value="{!!$blog_info->blog_title!!}"><span style="color: red" id="erbt"></span>
					
				</div>
			</div>
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
				<div class="col-sm-10">
					<select name="category_id" style="padding: 6px" value="{{$blog_info->category_id}}">
                                    <option value="-1"> --Select Category-- </option>
                                    @foreach ($category_info as $v_category)
                                    <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
                                    @endforeach
                        </select><span style="color: red" id="erct"></span><span style="color: red" id="erct"></span>
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword3" class="col-sm-2 col-form-label">Blog Short Description</label>
				<div class="col-sm-10">
					<textarea name="blog_short_description" rows="3" cols="85%" >{!!$blog_info->blog_short_description!!}</textarea><span style="color: red" id="erbsd"></span>
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword3" class="col-sm-2 col-form-label">Blog Long Description</label>
				<div class="col-sm-10">
					<textarea name="blog_long_description" rows="10" cols="85%" >{!!$blog_info->blog_long_description!!}</textarea><span style="color: red" id="erbld"></span>
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword3" class="col-sm-2 col-form-label">Blog Image</label>
				<div class="col-sm-10">
					<input type="file" name="blog_image">

					<input type="hidden" name="blog_old_image" value="{{$blog_info->blog_image}}" class="span6 typeahead" id="typeahead" ><br>
                                <img src="{{asset($blog_info->blog_image)}}" width="100" height="120"/><span style="color: red" id="erbi"></span>
				</div>
			</div>
			
			<hr>
			<div class="form-group row">
				<div class="col-sm-10">
					<button type="reset" class="btn btn-danger btn-lg">Cancel</button>
					<button type="submit" class="btn btn-primary btn-lg">Update Blog</button>
				</div>
			</div>
		</form>

		<script type="text/javascript">
                    document.forms['myForm'].elements['category_id'].value=<?php echo $blog_info->category_id?>
                    
        </script>


		<?php }?>
		









		@endsection