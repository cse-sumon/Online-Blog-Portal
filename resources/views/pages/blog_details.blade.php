@extends('master')
@section('main_content')


<h4 style="color: red">  {!!$blog_info->blog_title!!}</h4>
<img src="{{asset($blog_info->blog_image)}}"  width="50%" height="250px" alt="Image" style="margin-bottom: 5px;"  class="text-center">
<p>{!!$blog_info->blog_long_description!!}</p>







<div class="box" style="border: 2px solid silver; margin-top: 30px" ></div>
<div class="content-form">
    <?php
    if (Auth::user() != NULL) {
        ?>
        <h3>Leave a comment</h3>

        <form class="form-horizontal" method="POST" action="{{URL::to('/save-comments')}}">
            {{ csrf_field() }}
            <textarea name="comments" style="padding-left: 5px; font-size: 16px" placeholder="Your Comments...." rows="5" cols="70%"></textarea>
            <input type="hidden" name="id" value="{{Auth::user()->id}}"/>
            <input type="hidden" name="blog_id" value="{{$blog_info->blog_id}}"/><br>

            <button class="btn btn-primary" name="btn">Submit</button>
        </form>
        <?php } 
        else { ?>
        <h4><a class="text text-blue" href="{{URL::to('/login')}}">Please login first to comments here.</a></h4>
        <?php } ?>

    </div>



    <div class="comments">
        <h3 class="bg-success">Comments</h3>
        <?php
        $published_comments = DB::table('tbl_comments')
        ->join('users','users.id', '=', 'tbl_comments.user_id')
        ->select('tbl_comments.*', 'name')
        ->where('publication_status', 1)
        ->where('blog_id',$blog_info->blog_id)
        ->orderBy('comments_id', 'desc')
        ->take(5)
        ->get();

        ?>

        <?php
        foreach ($published_comments as $v_comments) {

            ?>


          
            <div class="comment-info">
                <table>
                    <tr>
                        <td>
                            <h4 style="color: red; font-weight: bold">{{$v_comments->name}}</h4>
                            <h5 style="color: blue">{{$v_comments->created_at}}</h5>

                        </td>
                        <td>
                            <p style="color: black;padding-left: 20px">{!!$v_comments->comments!!}</p>
                        </td>
                    </tr>
                    <hr>
                </table>


            </div>

        </div>
            
        <?php } ?>

    </div>


    @endsection