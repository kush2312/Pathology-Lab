@extends('layouts.admin')

@section('title') Pathology Lab | Home @endsection

@section('content_header')

<section class="content-header">
      <h1>
        Tests
        <small>Add New</small>
      </h1>
    </section>
    
@endsection

@section('main_content')

    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">                
                <div class="panel panel-default">
                    <div class="panel-heading">Payment {{ $payment->id }}</div>
                    <div class="panel-body">
                        
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/payments', $payment->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Payment',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $payment->id }}</td>
                                    </tr>
                                    <tr><th> Invoice Id </th><td> {{ $payment->invoice_id }} </td></tr><tr><th> Remarks </th><td> {{ $payment->remarks }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

             </div>
        </div>
    </section>

@endsection