<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        .table_center
        {
            text-align:center;
            margin:auto;
            border: 1px solid yellowgreen;
            margin-top:50px;
        }
        th
        {
            background-color: skyblue;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            color:black;
            ;
        }
        .img_event
        {
            width:100px;
        
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
            


            @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    </div>
             @endif
        
        
             <div>

                <table class="table_center">
                
                    <tr>
                        <th>Event Name</th>
                        <th>Ticket Price Vip</th>
                        <th>Ticket Price Regular</th>
                        <th>Event Description</th>
                        <th>Maximum Attendees</th>
                        <th>Event Image</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                    
                   @foreach($event_d as $event_d)
                    <tr>
                        <td>{{$event_d->Event_title}}</td>
                        <td>{{$event_d->ticket_price_vip}}</td>
                        <td>{{$event_d->ticket_price_regular}}</td>
                        <td>{{$event_d->description}}</td>
                        <td>{{$event_d->max_attendees}}</td>
                        
                        <td>
                            <img class="img_event" src="event/{{$event_d->event_img}}">
                        </td>
                        <td>
                            <a href="{{url('event_delete',$event_d->id)}}"class="btn btn-danger">Delete</a>
                        </td>
                        
                        <td>
                            <a href="{{url('edit_event',$event_d->id)}}" class="btn btn-info">Update</a>
                        </td>
                    </tr>
                    @endforeach


                </table>



            </div>

          </div>
        </div>
        </div>

        @include('admin.footer')
  </body>
</html>