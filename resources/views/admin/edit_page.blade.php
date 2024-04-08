<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')

    <style>
        .post_title{
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }
        .div_center{
            text-align: center;
            padding: 30px;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .img_design{
            margin-left: auto;
            margin-right: auto;
            height: 100px;
            width: 100px;
            display: flex;
            justify-content: space-between;
        }
    </style>
  </head>
  <body>


    @include('admin.header')


    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->

      @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
      <div class="page-content">

        @if(session()->has('message'))

        <div class="alert alert-success">
            <button class="close" data-dismiss="alert" ariaa-hidden="true" >x</button>
            {{session()->get('message')}}
        </div>

        @endif

        

        <h1 class="post_title">Edit Post</h1>

        <div>

            <form action="{{url('update_post',$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_center">
                    <label for="">Post Title</label>
                    <input type="text" name="title" value="{{$post->name}}">
                </div>
                <div class="div_center">
                    <label for="">Post Description</label>
                    <Textarea name="description">{{$post->description}}</Textarea>
                </div>
                <div class="img_design">
                    <label for="">Old image</label>
                    <img src="/postimage/{{$post->image}}" alt="">
                </div>
                <div class="div_center">
                    <label for="">Update image</label>
                    <input type="file" name="image">
                </div>
                <div class="div_center">
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
      </div>
      

        @include('admin.footer')
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="admincss/vendor/jquery/jquery.min.js"></script>
    <script src="admincss/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="admincss/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admincss/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admincss/vendor/chart.js/Chart.min.js"></script>
    <script src="admincss/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admincss/js/charts-home.js"></script>
    <script src="admincss/js/front.js"></script>
  </body>
</html>