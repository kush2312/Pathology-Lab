@extends('layouts.admin')

@section('title') Pathology | Home @endsection

@section('content_header')

<section class="content-header">
      <h1>
        Appointments
        <small>Details</small>
      </h1>
    </section>
    
@endsection

@section('main_content')

    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">                



                <div class="panel panel-default">
                    <div class="panel-heading">Appointment ID: {{ $appointment->id }}</div>
                    <div class="panel-body">
                        {!! Form::open([
                            'method'=>'GET',
                            'url' => ['/admin/samples/create'],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-share" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-info btn-xs',
                                    'title' => 'Collect Sample',
                                    'data-toggle' => 'tooltip'
                            )) !!}
                            {{ Form::hidden('appointment_id', $appointment->id) }}
                            {{ Form::hidden('patient_id', $appointment->patient->id) }}
                            {{ Form::hidden('test_id', $appointment->test->id) }}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $appointment->id }}</td>
                                    </tr>
                                    <tr><th> Patient Name </th><td> {{ $appointment->patient->name }} </td></tr>
                                    <tr><th> Test Name </th><td> {{ $appointment->test->name }} </td></tr>
                                    <tr><th> Date </th><td> {{ $appointment->date }} </td></tr>
                                    <tr><th> Slot </th><td> {{ $slot }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

             </div>
        </div>
    </section>

@endsection