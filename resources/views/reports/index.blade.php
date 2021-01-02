@extends('layouts.admin')

@section('title') Pathology Lab | Home @endsection

@section('content_header')
<section class="content-header">
      <h1>
        Reports
        <small>View All</small>
      </h1>
    </section>
@endsection

@section('main_content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Reports</div>
                    <div class="panel-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Sample Id </th><th> Remarks </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($reports as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->sample_id }}</td><td>{{ $item->remarks }}</td>
                                        <td>                                       
                                            <a href="{{ url('/admin/reports/' . $item->id) }}" class="btn btn-success btn-xs" title="View Report"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/reports/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Report"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/reports', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Report" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Report',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}    
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $reports->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection