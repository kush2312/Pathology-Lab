@extends('layouts.admin')

@section('title') Pathology Lab | Home @endsection

@section('content_header')
<section class="content-header">
      <h1>
        Samples
        <small>View All</small>
      </h1>
    </section>
@endsection

@section('main_content')
<section class="content">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Samples</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>ID</th><th> Sample Type </th><th> Patient Name</th><th> Collect Date </th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($samples as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ ucwords($item->sample_type) }}</td><td>{{ $item->patient->name }}</td><td>{{ $item->collect_date }}</td>
                                    <td> 
                                        <a href="{{ url('/admin/samples/' . $item->id) }}" class="btn btn-success btn-xs" data-toggle="tooltip"  title="View Sample"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></a>
                                        <a href="{{ url('/admin/samples/' . $item->id . '/edit') }}" data-toggle="tooltip" class="btn btn-primary btn-xs" title="Edit Sample"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/admin/samples', $item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" />', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'title' => 'Delete Sample',
                                                    'data-toggle' => 'tooltip',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                        {!! Form::close() !!}

                                        {!! Form::open([
                                            'method'=>'GET',
                                            'url' => '/admin/reports/create',
                                            'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<span class="glyphicon glyphicon-share" aria-hidden="true"  />', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-info btn-xs',
                                                    'data-toggle' => 'tooltip',
                                                    'title' => 'Generate Report'
                                            )) !!}

                                            {{ Form::hidden('sample_id', $item->id) }}
                                            {{ Form::hidden('test_id', $item->test->id) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $samples->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection