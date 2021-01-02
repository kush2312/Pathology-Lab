@extends('layouts.user')
@section('content')

<div class="container">
    <div class="card">
        <h5 class="card-header">Report {{ $report->id }}</h5>
        <div class="card-body">
            <a href="{{ route('reports.print', $report->id) }}" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Print</a> 
            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr><th scope="row">ID</th><td>{{ $report->id }}</td></tr>
                        <tr><th scope="row">Sample Id </th><td> {{ $report->sample_id }} </td></tr>
                        <tr><th scope="row">Remarks </th><td> {{ $report->remarks }} </td></tr>
                    </tbody>
                </table>
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
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Normal</th>
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
</div>

@endsection