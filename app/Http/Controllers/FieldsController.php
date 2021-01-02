<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;
use App\Models\Test;
use Session;

class FieldsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $fields = Field::paginate(25);

        return view('fields.index', compact('fields'));
    }

    public function create()
    {
        $tests = Test::all();
        
        foreach ($tests as $test) {
            $test_data[$test->id] = $test->name;
            error_log(gettype($test_data));
        }

        return view('fields.create', ['tests' => $test_data]);
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        
        Field::create($requestData);

        Session::flash('flash_message', 'Field added!');

        return redirect('admin/fields');
    }

    public function show($id)
    {
        $field = Field::findOrFail($id);

        return view('fields.show', compact('field'));
    }

    public function edit($id)
    {
        $field = Field::findOrFail($id);

        $tests = Test::all();
        
        foreach ($tests as $test) {
            $test_data[$test->id] = $test->name;
        }

        return view('fields.edit', compact('field'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        
        $field = Field::findOrFail($id);
        $field->update($requestData);

        Session::flash('flash_message', 'Field updated!');

        return redirect('admin/fields');
    }

    public function destroy($id)
    {
        Field::destroy($id);

        Session::flash('flash_message', 'Field deleted!');

        return redirect('admin/fields');
    }
}
