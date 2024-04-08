<!DOCTYPE html>
<html>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <head> 
    @include('admin.css')

    <style>
        .title_design{
            font-size: 30px;
            font-weight: bold;
            color: white;
            text-align: center;
            padding: 30px;

        }
        .table_design{
            box-sizing: border-box;
            border: 1px solid white;
            width: 80%;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            
          
        }
        .header_tr_design{
            background-color: rgb(193, 7, 69);
            color: white;
        }
        .img_design{
            height: 50px;
            width: 50px;
            border-radius: 50%;
            padding: 10px;
        }
       
    </style>
  </head>
 
  <body>


    @include('admin.header')


    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->

      @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
      {{-- @include('admin.body') --}}

      <div class="page-content">

       @if (session()->has('message'))
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
          {{session()->get('message')}}
        </div>
           
       @endif


        <h1 class="title_design">All Posts</h1>



      

            <table class="table_design">

                <tr class="header_tr_design">
    
    
                    <th>Post Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>User Type</th>
                    <th>Actions</th>
    
                </tr>
                @foreach ($post as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>
                        <img class="img_design" src="postimage/{{$post->image}}" alt="##">
                    </td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->post_status}}</td>
                    <td>{{$post->usertype}}</td>
                    <td>
                      <form action="{{url('delete_post',$post->id)}}" method="POST">
                        @csrf
                        @method('get')
                         <input onclick="confirmation(event)"  type="submit" class="btn btn-danger" value="Delete">
                      </form>
                      <a class="btn btn-success" href="{{url('/edit_page',$post->id)}}">Edit</a>
                     
                    </td>
                </tr>
                @endforeach
               
            </table>
        

       




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


    {{-- <script>
      function confirmation(ev){
        ev.preventDefault();
        var urlToRedirect=ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);

        swal({
          title: "Are you sure to delete this post",
          text: "You won't be able to undo after deletion",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willCancel){

          if(willCancel){
            window.location.href=urlToRedirect;
          }
      });
      }
    </script> --}}


  </body>
  
</html>