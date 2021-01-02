@extends('layouts.admin')

@section('title') Pathology Lab | Home @endsection

@section('content_header')

<section class="content-header">
      <h1>
        Invoices
        <small>Details</small>
      </h1>
    </section>
    
@endsection

@section('main_content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">  
                <div class="panel panel-default">
                    <div class="panel-heading">Deatils for Invoice ID: {{ $invoice->id }}</div>
                    <div class="panel-body">
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['invoices', $invoice->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Invoice',
                                    'data-toggle' => 'tooltip',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $invoice->id }}</td>
                                    </tr>
                                    <tr><th> Appointment Id </th><td> {{ $invoice->appointment_id }} </td></tr>
                                    <tr><th> Amount </th><td> {{ $invoice->amount }} INR</td></tr>
                                    <tr><th> Status </th><td> {{ $invoice->status }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

             </div>
        </div>
    </section>

@endsection