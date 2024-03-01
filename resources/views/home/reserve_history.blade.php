<!DOCTYPE html>
<html lang="en">

  <head>

   @include('home.css')

   <style>


    .table_deg
    {
        border: 3px solid black;
        margin: auto;
        text-align: center;
        margin-top: 100px;
    }
    th
    {
        color: white;
        font-weight: bold;
        font-size: 20px;

    }
    td
    {
        color: white;
        border:2px solid black;

    }
    .event_img
    {
        height: 80px;
        width: 50px;
        margin: auto;
    }

    </style>
  </head>

<body>
    @include('home.header')

    <div class="main-banner">
        <div class="container">
          <div class="row">


            <table class="table_deg">
                <tr>
                    <th>Event Name</th>
                    <th> Reserved Time </th>
                    <th>Price Vip</th>
                    <th>Price Regular</th>
                    <th>Image</th>
                    
                    
                    
                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->event->Event_title}}</td>
                    <td>{{$data->event->created_at}}</td>
                    <td>{{$data->event->ticket_price_vip}}</td>
                    <td>{{$data->event->ticket_price_regular}}</td>
                    <td>
                        <img class="event_img" src="event/{{$data->event->event_img}}">
                    </td>

                </tr>
                @endforeach

            </table>
          </div>
        </div>
    </div>  
    @include('home.footer')

  </body>
</html>