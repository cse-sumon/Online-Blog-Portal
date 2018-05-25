@extends('master')
@section('main_content')

        @foreach($all_published_blog as $v_blog)
         <div class="col-sm-6" style="margin-bottom: 40px; float: left">
          <h4><a style="color: red" href="{{URL::to('blog-details/'.$v_blog->blog_id)}}">{{$v_blog->blog_title}}</a></h4>
          <img src="{{asset($v_blog->blog_image)}}"  width="98%" height="190px" alt="Image" style="margin-bottom: 5px">
          <p style="font-size: 14px">{!!$v_blog->blog_short_description!!}</p><a href="{{URL::to('blog-details/'.$v_blog->blog_id)}}">See More..</a>
          
        </div>
      @endforeach

@endsection