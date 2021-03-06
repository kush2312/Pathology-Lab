@extends('layouts.admin')

@section('title') Pathology Lab @endsection

@section('content_header')

<section class="content-header">
      <h1>
        Report
        <small>Details</small>
      </h1>
      {{-- <a href="{{ route('reports.print', $report->id) }}" class="btn btn-success"><i class="fa fa-print"></i> Print</a> --}}
      
    </section>
    
@endsection

@section('main_content')

    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">                
                <div class="panel panel-default">
                    <div class="panel-heading">Report {{ $report->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/reports/' . $report->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Report"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        <a href="{{ route('reports.print', $report->id) }}" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Print</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/reports', $report->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Report',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th>ID</th><td>{{ $report->id }}</td></tr>
                                    <tr><th>Sample Id </th><td> {{ $report->sample_id }} </td></tr>
                                    <tr><th>Remarks </th><td> {{ $report->remarks }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Result Summary</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>

                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Normal</th>
                        </tr>

                        @foreach($results as $result)
                        <tr>
                          <td>{{$result->name}}</td>
                          <td>{{$result->quantity}}</td>
                          <td>{{$result->unit}}</td>
                          <td>{{$result->normal}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                    </table>
                    </div>
                    <!-- /.box-body -->
                  </div>


             </div>
        </div>
    </section>

@endsection