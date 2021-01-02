@extends('layouts.user')
@section('content')

<div class="container">
    <div class="card">
        <h5 class="card-header">Details for Invoice ID: {{ $invoice->id }}</h5>
        <div class="card-body">
            {!! Form::open([
                'method'=>'GET',
                'url' => ['/admin/payments/create'],
                'style' => 'display:inline'
            ]) !!}
                {!! Form::button('Make Payment', array(
                        'type' => 'submit',
                        'class' => 'btn btn-primary',
                        'title' => 'Make Payment',
                        'data-toggle' => 'tooltip',
                )) !!}
                {{ Form::hidden('invoice_id', $invoice->id) }}
            {!! Form::close() !!}
            <br>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">ID</th><td>{{ $invoice->id }}</td>
                        </tr>
                        <tr><th scope="row"> Appointment Id </th><td> {{ $invoice->appointment_id }} </td></tr>
                        <tr><th scope="row"> Amount </th><td> {{ $invoice->amount }} INR</td></tr>
                        <tr><th scope="row"> Status </th><td> {{ $invoice->status }} </td></tr>
                    </tbody>
                </table>
            </div>
         </div>
    </div>
</div>


@endsection