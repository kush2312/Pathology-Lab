<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Field;
use App\Models\Sample;
use App\Models\User;
use App\Models\Appointment;
use Session;
use Carbon\Carbon;
use Auth;
use DB;
use PDF;
use App;
use Dompdf\Dompdf;
use Dompdf\Options;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }
    
    public function index()
    {
        if(Auth::guard('admin')->check())
        {
            $reports = Report::paginate(25);
            return view('reports.index', compact('reports'));
        }
        else
        {
            $id =Auth::user()->id;
            $patient = User::where('id', $id)->first();
            $samples = Sample::where('patient_id', $patient->id)->pluck('id')->toArray();
            $reports = Report::whereIn('sample_id', $samples)->paginate(10);
            return view('reports.index_user', compact('reports'));
        }
    }

    
    public function create(Request $request)
    {
        if(Auth::guard('admin')->check())
        {
            $requestData = $request->all();
            $test_fields = Field::where('test_id', $requestData['test_id'])->get()->toArray();
            return view('reports.create', ['data' => $requestData, 'test_fields' => $test_fields]);
        }
        else    
            abort(404);
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        $results = [];
        foreach ($requestData as $key => $value) {
            if (is_int($key)) {
                $field = Field::where('id', $key)->first()->toArray();

                $result = [];

                $result['name'] = $field['name'];
                $result['quantity'] = $value;
                $result['unit'] = $field['unit'];
                $result['normal'] = $field['normal'];
                $result['field_id'] = $field['id'];

                array_push($results, $result);
                unset($requestData[$key]);
            }
        }

        $requestData['results'] = json_encode($results);
        
        $report = Report::create($requestData);
        $sample = Sample::findOrFail($report->sample_id);
        $appointment = Appointment::where('id', $sample->appointment_id)->first();
        
        $appointment->status = 'done';
        $appointment->save();

        Session::flash('flash_message', 'Report added!');

        return redirect('admin/reports');
    }

    public function show($id)
    {
        if(Auth::guard('admin')->check())
        {
            $report = Report::findOrFail($id);
            return view('reports.show', ['report' => $report, 'results' => json_decode($report->results)]);
        }
        else
        {
            //here we have to check if the report belongs to him
            $report = Report::findOrFail($id);
            return view('reports.show_user', ['report' => $report, 'results' => json_decode($report->results)]);
        }
    }

    public function edit($id)
    {
        if(Auth::guard('admin')->check())
        {
            $report = Report::findOrFail($id);
            $results = json_decode($report->results);
            return view('reports.edit', ['report' => $report, 'results' => $results]);
        }
        else
            abort(404);
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $results = [];
        foreach ($requestData as $key => $value) {
            if (is_int($key)) {

                //dd($key);
                // get the field setails
                $field = Field::where('id', $key)->first()->toArray();

                $result = [];

                $result['name'] = $field['name'];
                $result['quantity'] = $value;
                $result['unit'] = $field['unit'];
                $result['normal'] = $field['normal'];
                $result['field_id'] = $field['id'];
                $result['ref_range'] = $field['ref_range'];

                array_push($results, $result);

                // remove from actual array
                unset($requestData[$key]);
            }
        }

        $requestData['results'] = json_encode($results);
        
        $report = Report::findOrFail($id);
        $report->update($requestData);

        Session::flash('flash_message', 'Report updated!');
        return redirect('reports');
    }

    public function destroy($id)
    {
        if(Auth::guard('admin')->check())
        {
            Report::destroy($id);
            Session::flash('flash_message', 'Report deleted!');
            return redirect('reports');
        }
        else
            abort(404);
    }

    public function printReport($id)
    {
        error_log("ID isssssssss $id");
        $report = Report::findOrFail($id)->first();

        $data['results'] = json_decode($report->results);

        //dd($data);

        $sample = $report->sample;

        $patient = $sample->patient;

        $test = $sample->test;

        //dd($sample->toArray());
        $data['report'] = $report->toArray();
        $data['sample'] = $sample->toArray();
        $data['patient'] = $patient->toArray();
        $data['test'] = $test->toArray();



        //$pdf = \PDF::loadView('pdf.reports', $data);
        $pdf = PDF::loadView('pdf.reports', $data);
        //dd($pdf);
        return $pdf->download('reports.pdf');
        //return $pdf->inline();
    }

}
