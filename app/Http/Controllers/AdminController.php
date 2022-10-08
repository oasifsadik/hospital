<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Notifications\SentEmailNotification;
use Illuminate\Notifications\Notification;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        // $doctor = new doctor;
        // $image= $request->file;
        // // $imagename = time().'.'.$image->getClientoriginalExtension();
        // $extention =$image->getClientOriginalExtension();
        // $imagename = time().'.'.$extention;
        // $request->file->move('doctorimage' ,$imagename);
        // $doctor->image=$imagename;

        // $doctor->name=$request->name;
        // $doctor->phone=$request->phone;
        // $doctor->speciality=$request->speciality;
        // $doctor->room=$request->room;

        // $doctor->save();
        // return redirect()->back();
        $doctor = new Doctor;
        $doctor->name = $request->input('name');
        $doctor->phone = $request->input('phone');
        $doctor->speciality = $request->input('speciality');
        $doctor->room = $request->input('room');

            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $extention =$file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file -> move('photos/',$filename);
                $doctor->image=$filename;
            }
        $doctor->save();

        return redirect()->back()->with('message','Doctor Added Successfully');



    }
    public function showappointment()
    {
        $data = Appointment::all();
        return view('admin.showappointment',compact('data'));
    }

    public function approved($id)
    {
        $data = Appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }
    public function cancel($id)
    {
        $data = Appointment::find($id);
        $data->status='cancel';
        $data->save();
        return redirect()->back();
    }

    public function showalldoctor()
    {
        $data = Doctor::all();
        return view('admin.showdoctor',compact('data'));
    }

    public function deletedoctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatedoctor($id)
    {
        $data= Doctor::find($id);
        return view('admin.update_doctor',compact('data'));
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->name = $request->input('name');
        $doctor->phone = $request->input('phone');
        $doctor->speciality = $request->input('speciality');
        $doctor->room = $request->input('room');

            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $extention =$file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file -> move('photos/',$filename);
                $doctor->image=$filename;
            }
        $doctor->save();
       return redirect()->back()->with('message','Doctor Updated Successfully');
    }

    public function emailview($id)
    {
        $data= Appointment::find($id);
        return view('admin.email_view',compact('data'));
    }

    public function sentemail(Request $request,$id)
    {
        $data = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionturl' => $request->actionturl,
            'endpart' => $request->endpart
        ];
        Notification::sent($data, new SentEmailNotification($details));

        return redirect()->back();
    }

    public function pescrib()
    {
        return view('admin.add_pescrib');
    }
}
