@extend('admin.admin_master')
@section('admin_main_content')

<!-- start: Content -->

<script type="text/javascript">
    function blogvalidateForm(){
        var blog_title=document.myForm.blog_title.value;
        var category_id=document.myForm.category_id.value;
        var blog_short_description=document.myForm.blog_short_description.value;
        var blog_long_description=document.myForm.blog_long_description.value;
        var blog_image=document.myForm.blog_image.value;
        var blog_old_image=document.myForm.blog_old_image.value;
    
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
         if(blog_image=="" && blog_old_image==""){
            document.getElementById('erbi').innerHTML="Required*";
            return false;
        }
   
    }


</script>

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Forms</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Blog Form</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
           <h3 style="color:green">
                <?php 
                  echo Session::get('message');
                   Session::put('message','');
                ?>
                
            </h3>
            
            <div class="box-content">
                <form name="myForm" onsubmit=" return blogvalidateForm();" class="form-horizontal" method="POST" action="{{URL::to('/update-blog')}}"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Blog Title</label>
                            <div class="controls">
                                <input type="text" value="{!!$blog_info->blog_title!!}" name="blog_title"class="span6 typeahead" id="typeahead" > <span style="color: red" id="erbt"></span>
                                <input type="hidden" name="blog_id" value="{{$blog_info->blog_id}}"class="span6 typeahead" id="typeahead" > 
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Category Name</label>
                            <div class="controls">
                                <select name="category_id" value="{{$blog_info->category_id}}">
                                    <option value="-1"> Select Category </option>
                                    @foreach ($category_info as $v_category)
                                    <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
                                    @endforeach
                                </select><span style="color: red" id="erct"></span>
                            </div>
                        </div>

                      
                            
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Blog Short Description</label>
                            <div class="controls">
                                <textarea class="cleditor" id="textarea2" name="blog_short_description" rows="3">{!!$blog_info->blog_short_description!!}</textarea><span style="color: red" id="erbsd"></span>
                            </div>
                        </div>
                        
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Blog Long Description</label>
                            <div class="controls">
                                <textarea class="cleditor" id="textarea2" name="blog_long_description" rows="3">{!!$blog_info->blog_long_description!!}</textarea><span style="color: red" id="erbld"></span>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Blog Image</label>
                            <div class="controls">
                                <input type="file" name="blog_image"class="span6 typeahead" id="typeahead" >
                                <input type="hidden" name="blog_old_image" value="{{$blog_info->blog_image}}" class="span6 typeahead" id="typeahead" >
                                <img src="{{asset($blog_info->blog_image)}}" width="100" height="150"/><span style="color: red" id="erbi"></span>
                            </div>
                        </div>
                        
<!--                        <div class="control-group">
                            <label class="control-label" for="typeahead">Publication Status</label>
                            <div class="controls">
                                <select name="publication_status">
                                    <option>--- Select Status ---</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>-->
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Blog</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>   
                <script type="text/javascript">
                    document.forms['myForm'].elements['category_id'].value=<?php echo $blog_info->category_id?>
                    
                </script>

            </div>
        </div><!--/span-->

 




</div><!--/.fluid-container-->

@endsection