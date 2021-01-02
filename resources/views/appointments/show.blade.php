@extends('layouts.user')
@section('content')

<div class="container">
    <div class="card">
        <h5 class="card-header">Appointment ID: {{ $appointment->id }}</h5>
        <div class="card-body">
            @if(Auth::guard('web')->check())
                <a href="{{ url('/appointments/' . $appointment->id . '/edit') }}" class="btn btn-primary" title="Edit Appointment" data-toggle="tooltip">Edit Appointment</a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['appointments', $appointment->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('Delete Appointment', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger',
                            'title' => 'Delete Appointment',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! Form::close() !!}
            @else 
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
            @endif
            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">ID</th><td>{{ $appointment->id }}</td>
                        </tr>
                        <tr><th scope="row"> Patient Name </th><td> {{ $appointment->patient->name }} </td></tr>
                        <tr><th scope="row"> Test Name </th><td> {{ $appointment->test->name }} </td></tr>
                        <tr><th scope="row"> Date </th><td> {{ $appointment->date }} </td></tr>
                        <tr><th scope="row"> Slot </th><td> {{ $slot }} </td></tr>
                    </tbody>
                </table>
            </div>
         </div>
    </div>
</div>

@endsection