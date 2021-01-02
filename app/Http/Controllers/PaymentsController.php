<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Invoice;
use Session;
use Auth;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }
    
    public function index()
    {
        if(Auth::guard('admin')->check())
        {   
            $payments = Payment::paginate(25);
            return view('payments.index', compact('payments'));
        }
    }

    public function create(Request $request)
    {
        if(Auth::guard('web')->check())
        {   
            $invoice_id = $request->invoice_id;
            return view('payments.create', ['invoice_id' => $invoice_id]);
        }
        else
            abort(404);
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        $invoice = Invoice::findOrFail($requestData['invoice_id']);
        $invoice->status = 'paid';
        $invoice->save();

        $requestData['status'] = 'paid';
        $requestData['paid_amount'] = $invoice->amount;

        
        Payment::create($requestData);

        Session::flash('flash_message', 'Payment added!');

        return redirect('/invoices');
    }

    public function show($id)
    {
        if(Auth::guard('admin')->check())
        {   
            $payment = Payment::findOrFail($id);
            return view('payments.show', compact('payment'));
        }
        
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
        Payment::destroy($id);

        Session::flash('flash_message', 'Payment deleted!');

        return redirect('/admin/payments');
    }
}
