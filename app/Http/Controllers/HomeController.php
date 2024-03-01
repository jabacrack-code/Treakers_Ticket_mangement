<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Event;

use App\Models\Reservation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\ReservationConfirmation;



class HomeController extends Controller
{
    public function index()
    {

        $data = Event::all();

        return view('home.index',compact('data'));
    }
    public function event_details($id)
    {
        $event = Event::find($id);

        return view('home.event_details', compact('event'));

    }
    public function explore()
    {

        $data = Event::all();
        return view('home.explore', compact('data'));

    }
    
    public function reserve_ticket($id)
    {
        $data = Event::find($id);
        $event_id = $id;
        $max_attendees = $data->max_attendees;
    
        if ($max_attendees >= 1) {
            if (Auth::check()) {
                $user_id = Auth::user()->id;
    
                // Count the number of tickets already reserved by the user
                $userTicketsCount = Reservation::where('user_id', $user_id)->count();
    
                // Check if the user has already reserved 5 tickets
                if ($userTicketsCount >= 5) {
                    return redirect()->back()->with('message', 'You have already reserved the maximum number of tickets.');
                } elseif ($userTicketsCount < 6) {
                    // If user has not reserved 5 tickets, proceed with the reservation
                    $reserve = new Reservation;
                    $reserve->event_id = $event_id;
                    $reserve->user_id = $user_id;
                    $reserve->save();
    
                    // Send email confirmation
                   $eventTitle = $data->Event_title;
                    $userEmail = Auth::user()->email;
                    Mail::to($userEmail)->send(new ReservationConfirmation($eventTitle));
    
                    return view('home.reservation_confirmation', compact('data'));
                }
            } else {
                return redirect('/login');
            }
        } else {
            return redirect()->back()->with('message', 'Not enough tickets available. The event is expired');
        }
    }
    
    public function reserve_history()
    {

        if(Auth::id())
        {
            $userid = Auth::user()->id;
            
            $data = Reservation::where('user_id','=',$userid)->get();
            
            
            return view('home.reserve_history', compact('data'));
        }
        
    }
    public function search(Request $request)
    {
        $search = $request->search;

        $data = Event::where('Event_title','LIKE','%'.$search.'%')->get();

        return view('home.explore', compact('data'));
    }
}
