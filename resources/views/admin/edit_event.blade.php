<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Ticket Manager Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}">
    
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{asset('admin/css/font.css') }}">
    
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/css/style.default.css') }}" id="theme-stylesheet">
    
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('admin/css/custom.css') }}">
    
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.ico') }}">
    
    <style>
        .div_center
        {
         text-align: center;
         margin: auto;

        }
        .title
        {
            color:white;
            padding:30px;
            font-size: 40px;
            font-weight:bold;

        }
        label
        {
           display:inline-block;
           width:200px; 
        }
        .div_pad
        {
            padding: 20px;
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
        <div class="page-header">
          <div class="container-fluid">
            
            <div class="div_center">

                <h1 class="title">Update Event</h1>

                <form action="{{url('update_event', $data->id)}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="div_pad">
                        <label>Event Name</label>
                        <input type="text" name="event_name" value="{{$data->Event_title}}">
                    </div>

                    <div class="div_pad">
                        <label>Ticket Price VIP</label>
                        <input type="text" name="price_vip" value="{{$data->ticket_price_vip}}">
                    </div>

                    <div class="div_pad">
                        <label>Ticket Price Regular</label>
                        <input type="text" name="price_regular" value="{{$data->ticket_price_regular}}">
                    </div>

                    <div class="div_pad">
                        <label>Event Description</label>
                        <textarea name="event_description">{{$data->ticket_price_regular}}</textarea>
                    </div>

                    <div class="div_pad">
                        <label>Maximum Attendees</label>
                        <input type="number" name="max_attend" value="{{$data->max_attendees}}">
                    </div>

                    <div class="div_pad">
                        <label>Current Event Image</label>
                        <img style="width:80px; margin:auto; border-radius: 50%;" src="/event/{{$data->event_img}}">
                        
                    </div>

                    <div class="div_pad">
                        <label>Change Event Image</label>
                        <input type="file" name="event_image" value="{{$data->event_img}}">
                    </div>

                    <div class="div_pad">
                        <input class="btn btn-primary" type="submit" value="Update Event">
                    </div>

                </form>

            </div>





          </div>
        </div>
    </div>


     <!--footer section-->
      <footer class="footer">
        <div class="footer__block block no-margin-bottom">
          <div class="container-fluid text-center">
            
             <p class="no-margin-bottom">2024 &copy; Treakers Event Handlers</a>.</p>
          </div>
        </div>
      </footer>
    </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admin/vendor/jquery/jquery.min.js"')}}></script>
    <script src="{{asset('admin/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admin/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/js/charts-home.js')}}"></script>
    <script src="{{asset('admin/js/front.js')}}"></script>
  </body>
</html>