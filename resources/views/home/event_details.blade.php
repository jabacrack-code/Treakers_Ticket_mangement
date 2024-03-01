<!DOCTYPE html>
<html lang="en">

  <head>
    
    <base href="/public">
   
    @include('home.css')
  </head>

<body>
    @include('home.header')


    <div class="currently-market">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2><em>Current Available Events</em></h2>
                    </div>
                </div>
      
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif
      
                <div class="col-lg-12">
                       

                        <div class="">
                            <div class="item">
                                <!-- Event image from database -->
                                <div class="left-image">
                                    <img src="event/{{ $event->event_img }}" alt="" style="border-radius: 20px; min-width: 195px;">
                                </div>
                                <!-- Event title from database -->
                                <div class="right-content">
                                    <h4>{{ $event->Event_title }}</h4>
                                    <!-- Display VIP ticket prices -->
                                    <span class="text-button">
                                        <h6>VIP Ticket Price: <emp style="color:greenyellow;"><b>{{ $event->ticket_price_vip }}</b></emp></h6>
                                        <a href="{{ url('reserve_ticket', $event->id) }}">Reserve Vip</a>
                                    </span>
                                    <br>
                                    <div class="line-dec"></div>
                                    <!-- Display regular ticket prices -->
                                    <span class="text-button">
                                        <h6>Regular Ticket Price: <emp style="color:greenyellow;"><b>{{ $event->ticket_price_regular }}</b></emp></h6>
                                        <a href="{{ url('reserve_ticket', $event->id) }}">Reserve Regular</a>
                                    </span>
                                    <!-- Display available and total attendees -->
                                    <p>
                                        Current Available: {{ $event->max_attendees }}
                                    </p>

                                    <p>
                                    Description: {{$event->description}}
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
      </div>
      

    @include('home.footer')

  </body>
</html>