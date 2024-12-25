<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('backend.pages.appointment.index');
    }

    public function getData()
    {
        $appointments = Appointment::all();


        return DataTables::of($appointments)
            
            ->addColumn('action', function ($appointment) 
            {
                return '<a class="btn btn-sm btn-danger" id="deleteAppointmentBtn" href="javascript:void(0)" data-id="'.$appointment->id.'"> 
                        <i class="fas fa-trash"> </i></a>';
                
            })                      
            ->addIndexColumn()
            ->make(true);
    }

    public function newsletter(Request $request)
    {
        $appointment = new Appointment();
        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->date = today();
        $appointment->status = 1;
        $appointment->save();
        
        return response()->json(['message' => 'Subscribe to Newsletter Successfully!'] , 200);
    }

    public function appointmentStatus(Request $request)
    {

        $id = $request->id;
        $status = $request->status;


        if ($status == 1) {
            $stat = 0;
        } else {
            $stat = 1;
        }

        $page = Appointment::findOrFail($id);
        $page->status = $stat;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $stat, 'id' => $id]);
    }
    
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return response()->json(['message' => 'success']);
    }
    
    
   
}
