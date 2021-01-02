<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;
use Session;

class SlotsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $slots = Slot::paginate(25);
        return view('slots.index', compact('slots'));
    }

    public function create()
    {
        return view('slots.create');
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        
        Slot::create($requestData);

        Session::flash('flash_message', 'Slot added!');

        return redirect('admin/slots');
    }

    public function show($id)
    {
        $slot = Slot::findOrFail($id);

        return view('slots.show', compact('slot'));
    }

    public function edit($id)
    {
        $slot = Slot::findOrFail($id);

        return view('slots.edit', compact('slot'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        
        $slot = Slot::findOrFail($id);
        $slot->update($requestData);

        Session::flash('flash_message', 'Slot updated!');

        return redirect('admin/slots');
    }

    public function destroy($id)
    {
        Slot::destroy($id);

        Session::flash('flash_message', 'Slot deleted!');

        return redirect('admin/slots');
    }
}
