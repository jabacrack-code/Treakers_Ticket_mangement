<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Event;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $user_type = Auth()->user()->usertype;
            if($user_type == 'admin')
            {
                $event_d = Event::all();
             return view('admin.crud_events', compact('event_d')); 
            }
            else if($user_type = 'user')
            {
                $data = Event::all();
                return view('home.index', compact('data'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function events_management()
    {

        $data = Event::all();

        return view('admin.events', compact('data'));

    }
    public function add_event(Request $request)
    {
        $data = new Event;

        $data->Event_title = $request->event_name;

        $data->ticket_price_vip = $request->event_vip_ticket;

        $data->ticket_price_regular = $request->event_regular_ticket;

        $data->max_attendees = $request->event_max_attend;

        $data->description = $request->description;

        $event_img = $request->event_img;

        // Check if an image was uploaded
        if ($request->hasFile('event_img')) {
            $event_img = $request->file('event_img');
            $event_img_name = time() . '.' . $event_img->getClientOriginalExtension();
            
            // Move the uploaded file to a public directory (in this case, 'event' directory)
            $event_img->move(public_path('event'), $event_img_name);
            
            // Save the image file name to the database
            $data->event_img = $event_img_name;
        }

        $data->save();

        return redirect()->back()->with('message', 'Event Added Succesfully');
    }

    
    public function crud_events()
    {
        $event_d = Event::all();
       return view('admin.crud_events', compact('event_d')); 
    }
    
    
    
    public function event_delete($id)
    {
        $data = Event::find($id);

        $data->delete();

        return redirect()->back()->with('message','Event Deleted Successfully');
    }
    public function edit_event($id)
    {

        $data = Event::find($id);

        return view('admin.edit_event',compact('data'));

    }
    public function update_event(Request $request, $id)
    {
        $data = Event::find($id);

        $data->Event_title =$request->event_name;

        $data->ticket_price_vip =$request->price_vip;

        $data->ticket_price_regular =$request->price_regular;

        $data-> description =$request->event_description;

        $data->max_attendees =$request->max_attend;


        $event_img = $request->event_img;

        // Check if an image was uploaded
        if ($request->hasFile('event_img')) {
            $event_img = $request->file('event_img');
            $event_img_name = time() . '.' . $event_img->getClientOriginalExtension();
            
            // Move the uploaded file to a public directory (in this case, 'event' directory)
            $event_img->move(public_path('event'), $event_img_name);
            
            // Save the image file name to the database
            $data->event_img = $event_img_name;
        }

        $data->save();

        return redirect('/crud_events')->with('message', 'Event Updated Succesfully');

    }
}
