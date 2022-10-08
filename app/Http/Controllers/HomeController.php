<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
          if(Auth::user()->usertype=='0')
          {
            $doctor = Doctor::all();
            return view('user.home',compact('doctor'));
          }
          else
          {
            return view('admin.home');
          }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else
        {
            $doctor = Doctor::all();
            return view('user.home', compact('doctor'));
        }

    }

    public function appointment(Request $request)
    {
        $data = new Appointment;
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->date = $request->input('date');
        $data->doctor = $request->input('doctor');
        $data->phone = $request->input('phone');
        $data->message = $request->input('message');
        $data->status = 'In progress';
        if(Auth::id())
        {
             $data->user_id = Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message','Appointment Request Successful . We will contact with yoou soon');
    }

    public function myappointment()
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;
            $appoint = Appointment::where('user_id', $userid)->get();
            return view('user.my_appointment',compact('appoint'));
        }
        else
        {
            return redirect()->back();
        }

    }
    public function cancel_appooint($id)
    {
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function about()
    {
        return view('user.about.about');
    }
    public function doctor()
    {
        $doctor = Appointment::get();
        return view('user.doctor.show_doctor',compact('doctor'));
    }
}
