<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Appointment;
use Session;
use Carbon\Carbon;
use Auth;
use DB;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }

    public function index()
    {
        if(Auth::guard('admin')->check())
        {
            $invoices = Invoice::paginate(25);
            return view('invoices.index', compact('invoices'));
        }
        
        else
        {
            $id=Auth::id();
            $patient = User::where('id', $id)->first();
            $appointments = Appointment::where('patient_id', $patient->id)->pluck('id')->toArray();

            $invoices = Invoice::whereIn('appointment_id', $appointments)->paginate(10);

            return view('invoices.index_user', compact('invoices'));
        }

    }

    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        abort(404);
    }

    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        if(Auth::guard('admin')->check())
            return view('invoices.show', compact('invoice'));
        else
            return view('invoices.show_user', compact('invoice'));
    }

    public function edit($id)
    {
        abort(404);
            
    }

    public function update(Request $request, $id)
    {
        abort(404);
    }

    public function destroy($id)
    {
        if(Auth::guard('admin')->check())
        {
            Invoice::destroy($id);
            Session::flash('flash_message', 'Invoice deleted!');
            return redirect('invoices');
        }
        else
            abort(404);
    }

    public function printInvoice($id)
    {
        //
    }
}
