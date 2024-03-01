<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .div_center
        {
            text-align: center;
            margin: auto;
        }
        .Event_label{
            font-size: 40px;
            font-weight: bold:
            padding: 35px;
            color: white;
        }
        label
        {
            display: inline-block;
            width: 200px;
        }

        .div_pad
        {
            padding: 20px;
        }
        .center{
            margin:auto;
            width: 50%;
            text-align: center;
            margin-top: 50px;
            border: 1px solid white;
        }
        th
        {
            background-color: skyblue;
            padding: 10px;
        }
        tr
        {
            border: 1px solid white;
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

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div class="div_center">
                <div>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    </div>
                    

                    @endif
                </div>

                <h1 class="Event_label"> Add Events </h1>
                
                <div>
                    <form action="{{url('add_event')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_pad">
                        <label for="">Event Name</label>
                        <input type="text" name="event_name" required>
                        </div>

                        <div class="div_pad">
                            <label for="">Vip Ticket Price</label>
                            <input type="text" name="event_vip_ticket" required>
                        </div class="div_pad">


                        <div class="div_pad" >
                                <label for="">Regular Ticket Price</label>
                                <input type="text" name="event_regular_ticket" required>
                        </div class="div_pad">


                        <div class="div_pad">
                            <label for="">Maximum Attendess</label>
                            <input type="number" name="event_max_attend" required>
                        </div>

                        <div class="div_pad">
                            <label for="">Event Description</label>
                            <textarea name="description"></textarea>
                        </div>

                        <div class="div_pad">
                            <label for=""> Event Image</label>
                            <input type="file" name="event_img" required>
                        </div>

                        <div class="div_pad">
                             <input class="btn btn-primary" type="submit" value="Add Event">
                        </div>
                    </form>
                </div>

          </div>
        </div>
      </div>
        @include('admin.footer')
  </body>
</html>