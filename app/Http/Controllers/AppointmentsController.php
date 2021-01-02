<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Test;
use App\Models\User;
use App\Models\Slot;
use App\Models\Invoice;
use App\Models\Appointment;

use Session;
use Auth;

class AppointmentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }
    
    public function index()
    {
        error_log("Inside index page");
        
        if(Auth::guard('admin')->check())
        {   
            $appointments = Appointment::paginate(25);
            return view('appointments.admin_index', compact('appointments')); 
        }
        else
        {
            $id = Auth::user()->id;
            $patient = User::where('id', $id)->first();
            $appointments = Appointment::where('patient_id', $patient->id)->paginate(10);

            if ($appointments->isEmpty()) {
                return view('appointments.index');
            } 
            else {
                return view('appointments.index', ['appointments' => $appointments]);
            }
        } 
    }

    public function create()
    {
        if(Auth::guard('admin')->check())
        { 
            $tests = Test::all();
            $patients = User::all();
            
            $patient_data = [];
            $test_data = [];
            
            foreach ($patients as $patient) {
                $patient_data[$patient->id] = $patient->name;
                
            }
            foreach ($tests as $test) {
                $test_data[$test->id] = $test->name;
            }
            
            return view('appointments.admin_create', ['tests' => $test_data, 'patients' => $patient_data]);
        }
        else
        {
            $tests = Test::all();
            $id = Auth::user()->id;
            $patient = User::where('id', $id)->first();
            $test_data = [];

            foreach ($tests as $test) {
                $test_data[$test->id] = $test->name;
            }

            return view('appointments.create', ['tests' => $test_data, 'patient' => $patient]);
        }

    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        $requestData['status'] = 'pending';
        $appointment = Appointment::create($requestData);

        // create invoice for this appointment
        $id = $this->createInvoice($appointment);
        if(Auth::guard('admin')->check())
            Session::flash('flash_message', 'Appointment added!');
        else
            Session::flash('flash_message', 'Appointment added! Please check the invoice to make payment');

        return redirect('appointments');
    }

    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        $slot = Slot::findOrFail($appointment->slot_id);
        if(Auth::guard('web')->check())
            return view('appointments.show', ['appointment' => $appointment, 'slot' => $slot->time]);
        return view('appointments.admin_show', ['appointment' => $appointment, 'slot' => $slot->time]); 
        
        
    }

    public function edit($id)
    {
        $tests = Test::all();
        $patients = User::all();
        //dd($patients);
        foreach ($patients as $patient) {
            $patient_data[$patient->id] = $patient->name;
        }
        foreach ($tests as $test) {
            $test_data[$test->id] = $test->name;
        }

        $appointment = Appointment::findOrFail($id);
        $slot = Slot::findOrFail($appointment->slot_id);

        return view('appointments.edit', ['appointment' => $appointment, 
                'patients' => $patient_data,
                'slot' => $slot->time,
                'tests' => $test_data]);
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        
        $appointment = Appointment::findOrFail($id);
        $appointment->update($requestData);

        Session::flash('flash_message', 'Appointment updated!');

        return redirect('appointments');
    }

    public function destroy($id)
    {
        Appointment::destroy($id);

        Session::flash('flash_message', 'Appointment deleted!');

        return redirect('appointments');
    }

    private function createInvoice($appointment){

        $invoice = new Invoice();

        $invoice->appointment_id = $appointment->id;
        $invoice->amount = $appointment->test->cost;
        $invoice->due_date = Carbon::today()->addDays(3);
        $invoice->status = 'unpaid';

        $invoice->save();

        return $invoice->id;
    }

    public function checkAvailableSlots(Request $request){
        
        error_log("Inside the check slots");
        $data = $request->all();
        
        $appointments = Appointment::where('test_id', $data['test_id'])
                                    ->where('status', 'pending')
                                    ->where('date', $data['date'])
                                    ->get();

        $test = Test::where('id', $data['test_id'])->first();;
        $slots = unserialize($test->slot);

        if ( $appointments->isEmpty() ) {
            $slots = Slot::find($slots);
            return response()->json(['status' => 'found', 'slots' => $slots->toArray()]);
        } 
        else {

            foreach ($appointments as $appointment) {
                
                if(($key = array_search($appointment->slot_id, $slots)) !== false) {
                    unset($slots[$key]);
                }
            }

            if ( empty($slots) ) {
                // all slots are occupied
                return response()->json(['status' => 'all_busy']);
            } else {
                // some slots are still available, return them
                $slots = Slot::find($slots);
                return response()->json(['status' => 'found', 'slots' => $slots->toArray()]);
            }
        }                       

        return response()->json(['status' => 'error']);

    }
}
