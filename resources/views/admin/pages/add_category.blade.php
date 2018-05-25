@extend('admin.admin_master')
@section('admin_main_content')

<!-- start: Content -->


 <script type="text/javascript">
    function validateForm() {
    var category_name = document.forms["myForm"]["category_name"].value;
    var publication_status = document.forms["myForm"]["publication_status"].value;
    if (category_name == "") {
        document.getElementById('erc').innerHTML='Required *';
        return false;
    }
    if (publication_status == "-1") {

        document.getElementById('ers').innerHTML="Required *";
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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category Form</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <h3 style="color:green">
                <?php 
                  echo Session::get('message');
                  echo Session::put('message','');
                ?>
                
            </h3>
            
            <div class="box-content">
                <form class="form-horizontal"  method="POST" name="myForm" onsubmit="return validateForm();" action="{{URL::to('/save-category')}}">
                            {{ csrf_field() }}
                
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Category Name</label>
                            <div class="controls">
                                <input type="text" name="category_name"class="span6 typeahead"  > <span style="color: red" id=erc></span>
                            </div>
                        </div>
                        
                            
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Category Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="category_description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Publication Status</label>
                            <div class="controls" >
                                <select name="publication_status" id="publication_status">
                                    <option value="-1">--- Select Status ---</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select><span style="color: red" id=ers></span>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="reset" class="btn btn-danger">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Category</button>
                            
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

 




</div><!--/.fluid-container-->

@endsection