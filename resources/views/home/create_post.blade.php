<!DOCTYPE html>
<html>
  <head> 
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
    </style>
  </head>
  <body>


    @include('admin.header')


    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->

      

      <!-- Sidebar Navigation end-->
      <div class="page-content">
       
            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
                
            @endif
        
        <h1 class="post_title">Add Post</h1>

        <div>

            <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_center">
                    <label for="">Post Title</label>
                    <input type="text" name="title">
                </div>
                <div class="div_center">
                    <label for="">Post Description</label>
                    <Textarea name="description"></Textarea>
                </div>
                <div class="div_center">
                    <label for="">Add Image</label>
                    <input type="file" name="image">
                </div>
                <div class="div_center">
                    
                    <input type="submit" class="btn btn-primary">
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