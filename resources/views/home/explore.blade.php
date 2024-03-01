<!DOCTYPE html>
<html lang="en">

  <head>

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
      
                
                <form action="{{url('search')}}" method="get">
                    @csrf
                <div class="row" style= "margin: 30px;">
                     <div class="col-md-8">
                            <input class="form-conrol" type="search" name="search" placeholder="Search for events title, ticket price">
                        </div>

                        <div col-md-4>
                            <input type="submit" class="btn btn-primary" name="" value="search">
                        </div>
                    </div>
                 </form>

                <div class="col-lg-12">
                    <div class="row grid">
                        @foreach ($data as $event)
                        <div class="col-lg-6 currently-market-item all msc">
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
                                    <div class="line-dec"></div>
                                    <!-- Display available and total attendees -->
                                    <span class="bid">
                                        Current Available<br><strong>{{ $event->max_attendees }}</strong><br>
                                    </span>
                                    <span class="ends">
                                        Total<br><strong>{{ $event->max_attendees }}</strong><br>
                                    </span>
                                    <div class="text-button">
                                        <a href="{{ url('event_details', $event->id) }}">View Event Details</a>
                                    </div>
                                </div>


                                @if(session()->has('message'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
                                    {{ session()->get('message') }}
                                </div>
                                @endif

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
      </div>
      
    @include('home.footer')

  </body>
</html>