@extend('admin.admin_master')
@section('admin_main_content')

<script type="text/javascript">
    function blogvalidateForm(){
        var blog_title=document.myForm.blog_title.value;
        var category_id=document.myForm.category_id.value;
        var blog_short_description=document.myForm.blog_short_description.value;
        var blog_long_description=document.myForm.blog_long_description.value;
        var blog_image=document.myForm.blog_image.value;
        var publication_status=document.myForm.publication_status.value;
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
       
        if(publication_status=="-1"){
            document.getElementById('erps').innerHTML="Required*";
            return false;
        }
       
    }


</script>


<!-- start: Content -->



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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Blog Form</h2>
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
                <form name="myForm" onsubmit="return blogvalidateForm();" class="form-horizontal" method="POST" action="{{URL::to('/save-blog')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Blog Title</label>
                            <div class="controls">
                                <input type="text" name="blog_title"class="span6 typeahead" id="typeahead" > <span style="color: red" id="erbt"></span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Category Name</label>
                            <div class="controls">
                                <select name="category_id">
                                    <option value="-1"> Select Category </option>
                                    @foreach ($published_category as $v_category)
                                    <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
                                    @endforeach
                                </select><span style="color: red" id="erct"></span>
                            </div>
                        </div>

                      
                            
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Blog Short Description</label>
                            <div class="controls">
                                <textarea class="cleditor" id="textarea2" name="blog_short_description" rows="3"></textarea><span style="color: red" id="erbsd"></span>
                            </div>
                        </div>
                        
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Blog Long Description</label>
                            <div class="controls">
                                <textarea class="cleditor" id="textarea2" name="blog_long_description" rows="3"></textarea><span style="color: red" id="erbld"></span>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Blog Image</label>
                            <div class="controls">
                                <input type="file" name="blog_image" class="btn file_import" id="typeahead" > <span style="color: red" id="erbi"></span>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Publication Status</label>
                            <div class="controls">
                                <select name="publication_status">
                                    <option value="-1">--- Select Status ---</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select><span style="color: red" id="erps"></span>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save Blog</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

 




</div><!--/.fluid-container-->

@endsection