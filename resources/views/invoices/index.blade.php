@extends('layouts.admin')

@section('title') Pathology Lab | Home @endsection

@section('content_header')
<section class="content-header">
      <h1>
        Invoices
        <small>View All</small>
      </h1>
    </section>
@endsection

@section('main_content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Invoices</div>
                    <div class="panel-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Invoice ID</th>
                                        <th>Appointment ID</th>
                                        <th>Patient Name</th>
                                        <th>Amount</th>
                                        <th>Status </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($invoices as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->appointment_id }}</td>
                                        <td>{{ $item->appointment->patient->name }}</td>
                                        <td>{{ $item->amount }}</td>
                                        @php
                                            $color;
                                            if($item->status == 'unpaid'){
                                                $color = 'bg-yellow';
                                            } elseif ($item->status == 'paid') {
                                                $color = 'bg-green';
                                            } else {
                                                $color = 'bg-red';
                                            }
                                        @endphp
                                        <td><small class="label {{ $color }}">{{ $item->status }}</small></td>
                                        <td>

                                            @if($item->status == 'paid') 
                                            <a href="{{ url('/admin/invoices/' . $item->id) }}" class="btn btn-success btn-xs" data-toggle="tooltip" title="View Invoice"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            @else

                                            <a href="{{ url('/admin/invoices/' . $item->id) }}" class="btn btn-success btn-xs" data-toggle="tooltip" title="View Invoice"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/invoices', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Invoice',
                                                        'data-toggle' => 'tooltip',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}

                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $invoices->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection