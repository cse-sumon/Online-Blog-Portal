@extend('admin.admin_master')
@section('admin_main_content')


<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Dashboard</a></li>
</ul>

<div class="row-fluid">

    <?php 
        $total_blog=DB::table('tbl_blog')       
            ->count();

     ?>

    <div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
        <div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
        <div class="number">{{$total_blog}}<i class="icon-arrow-up"></i></div>
        <div class="title">Total Blog</div>
        <div class="footer">
            <a href="#"> read full report</a>
        </div>  
    </div>
    <?php 
        $total_blog=DB::table('tbl_blog')
             ->where('publication_status',1)        
            ->count();

     ?>

    <div class="span3 statbox pink" onTablet="span6" onDesktop="span3">
        <div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
        <div class="number">{{$total_blog}}<i class="icon-arrow-up"></i></div>
        <div class="title">Published Blog</div>
        <div class="footer">
            <a href="#"> read full report</a>
        </div>  
    </div>

    <?php 
        $total_un_blog=DB::table('tbl_blog')
        ->where('publication_status',0) 
            ->count();          
     ?>

    <div class="span3 statbox red" onTablet="span6" onDesktop="span3">
        <div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
        <div class="number">{{$total_un_blog}}<i class="icon-arrow-down"></i></div>
        <div class="title">Unpublished Blog</div>
        <div class="footer">
            <a href="#"> read full report</a>
        </div>  
    </div>



      <?php 
        $total_category=DB::table('tbl_category')
            ->count();          
     ?>
    <div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
        <div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
        <div class="number">{{$total_category}}<i class="icon-arrow-up"></i></div>
        <div class="title">Total Category</div>
        <div class="footer">
            <a href="#"> read full report</a>
        </div>
    </div>  

  <?php 
        $total_comments=DB::table('tbl_comments')
            ->count();          
     ?>

    <div class="span3 statbox green" onTablet="span6" onDesktop="span3">
        <div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
        <div class="number">{{$total_comments}}<i class="icon-arrow-up"></i></div>
        <div class="title">Total Comments</div>
        <div class="footer">
            <a href="#"> read full report</a>
        </div>
    </div>

    <?php 
        $total_un_comments=DB::table('tbl_comments')
        ->where('publication_status',0) 
            ->count();          
     ?>

    <div class="span3 statbox red" onTablet="span6" onDesktop="span3">
        <div class="boxchart">5,6,7,2,0,4,2,4,8,2</div>
        <div class="number">{{$total_un_comments}}<i class="icon-arrow-down"></i></div>
        <div class="title">Unpublished Comments</div>
        <div class="footer">
            <a href="#"> read full report</a>
        </div>  
    </div>


    <?php 
        $total_users=DB::table('users')
            ->count();          
     ?>
    <div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
        <div class="boxchart">5,6,7,2,0,-4,-2,4,8,2,3,3,2</div>
        <div class="number">{{$total_users}}<i class="icon-arrow-up"></i></div>
        <div class="title">Total Users</div>
        <div class="footer">
            <a href="#"> read full report</a>
        </div>
    </div>

  

</div>		



@endsection

