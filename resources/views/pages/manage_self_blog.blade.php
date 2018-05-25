@extend('master')
@section('main_content')


<script type="text/javascript">
    function check_delete()
    {
        check=confirm("Are you sure to Delete this ?");
        if(check)
        {
            return true;
        }
        else
            return false;
    }

</script>

<!-- start: Content -->



    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Manage Blog Form</a> 
            <i class="icon-angle-right"></i>
        </li>
        
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                           
                            <th>Blog Title</th>
                            <th>Blog Image</th>
                            <th>Bloger Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php
                        foreach ($all_blog as $v_blog)
                        
                        { ?>

                        <tr>
                           
                            <td>{{$v_blog->blog_title}}</td>
                            <td><img src="{{asset($v_blog->blog_image)}}" width="50" height="70"/></td>
                            <td>{{Auth::user()->name}}</td>
                            
                            <td class="center">
                                <?php
                                 if($v_blog->publication_status == 1 )
                                {?>
                                <span> Published</span>
                                
                                <?php } 
                                else if($v_blog->publication_status == 0 )
                                    { ?>
                                <span >Unpublished</span>
                                <?php }?>
                            </td>
                            
                            <td class="center">
                                
                                <a href="{{URL::to('/edit-bloger-content/'.$v_blog->blog_id)}}" title="Press to Edit"><button type="button" class="btn btn-primary">Edit</button></a>

                                <a href="{{URL::to('/unpublished-bloger-content/'.$v_blog->blog_id)}}" title="Press to Unpublished" ><button type="button" class="btn btn-danger">Remove</button></a>

                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->
    </div>

@endsection
