<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      @include('home.homecss')
     
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.headersection')
      <!-- header section end -->

      <!--Banner section starts here -->
      @include('home.bannersection')
      <!-- services section start -->
      @include('home.servicesection')
      <!-- services section end -->
      <!-- about section start -->
      @include('home.about')
      <!-- about section end -->
      <!-- blog section start -->
      @include('home.blog')
      <!-- blog section end -->
      
      <!-- client section start -->
      
      <!-- footer section start -->
      @include('home.footer') 
   </body>
</html>