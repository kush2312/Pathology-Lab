@extends('layouts.admin')

@section('title') Pathology Lab | Home @endsection

@section('content_header')
<section class="content-header">
      <h1>
        Payments
        <small>View All</small>
      </h1>
    </section>
@endsection

@section('main_content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Payments</div>
                    <div class="panel-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Invoice ID </th><th> Remarks </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->invoice_id }}</td><td>{{ $item->remarks }}</td>
                                        <td>
                                            <a href="{{ url('/admin/payments/' . $item->id) }}" class="btn btn-success btn-xs" title="View Payment"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/payments', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Payment" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Payment',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $payments->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection