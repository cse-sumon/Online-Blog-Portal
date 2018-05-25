<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('public/font_end_assets/css/style.css')}}">
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

</head>
<body>
  <header>
    <div class="row">
      <div>

        <nav class="navbar navbar-inverse">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
              <a style="color: red" class="navbar-brand" href="{{URL::to('/')}}"><i class="material-icons" style="font-size:50px;color:red;">Free</i> Blog</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li><a href="{{URL::to('/about')}}">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="{{URL::to('/bloger-write')}}">Write Blog</a></li>
              </ul>

              <ul class="nav navbar-nav navbar-right">
               <?php
               if(Auth::user()==NULL)
                { ?>
                  <li><a href="{{URL::to('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                  <li><a href="{{URL::to('register')}}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                  <?php }
                  else { ?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a style="padding-left: 10px;" href="{{URL::to('/manage-self-blog')}}">Manage Blog</a><br>
                      
                      <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      <p style="padding-left: 10px;">Logout</p>

                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </li>

                <?php }?>

              </ul>


            </div>
          </div>
        </nav>
      </div>
      
    </div>
  </header>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="height: 270px">
      <div class="item active">
        <img src="{{asset('public/font_end_assets/images/banner1.jpg')}}" alt="Image" width="100%" height="270px">
        <div class="carousel-caption">
        </div>      
      </div>

      <div class="item">
        <img src="{{asset('public/font_end_assets/images/banner2.jpg')}}" alt="Image" width="100%" height="270px">
        <div class="carousel-caption">
        </div>      
      </div>
      <div class="item">
        <img src="{{asset('public/font_end_assets/images/banner3.jpg')}}" alt="Image" width="100%" height="270px">
        <div class="carousel-caption">
        </div>      
      </div>
      <div class="item">
        <img src="{{asset('public/font_end_assets/images/banner4.jpg')}}" alt="Image" width="100%" height="270px">
        <div class="carousel-caption">
        </div>      
      </div>
      <div class="item">
        <img src="{{asset('public/font_end_assets/images/banner5.jpg')}}" alt="Image" width="100%" height="270px">
        <div class="carousel-caption">
        </div>      
      </div>
    </div>


    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  
  <!-- Content Start -->
  <div class="container">    
    <div class="well text-right">
      <form  action="{{URL::to('/search')}}">
        <input class="" type="text" name="search" placeholder="Search...">
        <!-- <button style="height:40px; border-radius: 5px"><i class="fas fa-search"></i></button> -->
      </form>


    </div>
    <div class="row">
      <div class="col-sm-4 align-left" >
        <!-- Sidebar Start -->
        <div class="sidebar">
          <div class="well">
            <h4 class=" active text-center">Catagories</h4>
            <div class="vertical-menu" style="height: 250px">
              <a class="" href="{{URL::to('/')}}">প্রথম পাতা</a>
              <?php
              $all_published_category=DB::table('tbl_category')
              ->select('*')
              ->where('publication_status',1)
              ->get();

              foreach($all_published_category as $v_category)
                {?>
                  <a href="{{URL::to('blog-by-category/'.$v_category->category_id)}}">{{$v_category->category_name}}</a>
                  <?php }?>
                </div>

              </div>
              <div class="well">
               <ul class="nav nav-pills nav-stacked">
                <li class="active"><a class="text-center">Recent Blog</a></li>
                <?php 
                $recent_blog= DB::table('tbl_blog')
                ->select('*')
                ->where('publication_status',1)
                ->take('5')
                ->get();
                foreach ($recent_blog as $v_blog) {


                  ?>
                  <li><a href="{{URL::to('blog-details/'.$v_blog->blog_id)}}">{!!$v_blog->blog_title!!}</a></li>
                  <?php }?>
                </ul>
              </div>
              
              <div class="well">
               <ul class="nav nav-pills nav-stacked">
                <li class="active"><a class="text-center">Popular Blog</a></li>
                <?php 
                $popular_blog=DB::table('tbl_blog')
                ->select('*')
                ->where('publication_status',1)
                ->take(5)
                ->orderBy('hit_count','DESC')
                ->get();
                foreach ($popular_blog as $v_blog)
                 { ?>

                  <li><a href="{{URL::to('/blog-details/'.$v_blog->blog_id)}}">{!!$v_blog->blog_title!!}</a></li>
                  <?php }?>
                </ul>
              </div>
            </div>
          </div>

          <!-- Sidebar End   -->

          <!-- Main Content Start -->
          <div class="col-sm-8 aign-right">
            <div class="content">


              @yield('main_content')


            </div>

          </div>

        </div>
        <!-- Main Content End -->

      </div><br>
      <!-- Content End -->



      <footer class="container-fluid text-center" style="background-color:lightgray;margin-top: 50px">
        <p style="color: black;  font-size: 18px">&copy; Sumon -2018 </p>
      </footer>


    </body>
    </html>
