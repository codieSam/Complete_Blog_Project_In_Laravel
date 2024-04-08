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
        .para_design{
            text-align: end;
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

        
        

        <h1 class="post_title">{{$post->title}}</h1>

        <div style="text-align: center;">
            <div><img style="height: 400px; width: 300px; margin:auto;" src="/postimage/{{$post->image}}" class="services_img"></div>
            <h4>This is a {{$post->title}} post</h4>
            <p>{{$post->description}}</p>
            <p class="para_design">- Post by <b>{{$post->name}}</b></p>
            
         

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