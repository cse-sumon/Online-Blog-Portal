@extend('admin.admin_master')
@section('admin_main_content')

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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category Form</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <!--<h3 style="color:green">-->
                <?php 
               echo Session::get('message');
                echo Session::put('message','');
               ?>
                
            </h3>
            
            <div class="box-content">
                <form class="form-horizontal" method="POST" action="{{URL::to('/update-category')}}">
                            {{ csrf_field() }}
                
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Category Name</label>
                            <div class="controls">
                                <input type="text" value="{{$category_info->category_name}}"name="category_name"class="span6 typeahead" id="typeahead" > 
                                <input type="hidden" value="{{$category_info->category_id}}"name="category_id"class="span6 typeahead" id="typeahead" > 
                            </div>
                        </div>
                        
                            
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Category Description</label>
                            <div class="controls">
                                <textarea class="cleditor" id="textarea2" name="category_description" rows="3">{{$category_info->category_description}}</textarea>
                            </div>
                        </div>
                       
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

 




</div><!--/.fluid-container-->

@endsection