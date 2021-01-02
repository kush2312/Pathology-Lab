<!DOCTYPE html>
<html>
<head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Report</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ public_path() . '/bootstrap/css/bootstrap.min.css'}}">
 
  <![endif]-->

</head>
<body class="hold-transition login-page">

<section class="invoice">
      <!-- title row -->

      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Test Report
            <small class="pull-right">Date: {{ \Carbon\Carbon::now()->format('d/m/Y')}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row">
        <div class="col-md-6 col-lg-6 col-xs-6">
          <address>
            <p><strong>Patient Details</strong></p>
            <p>Patient Name: {{ $patient['name'] }} </p>
            <p>Patient ID: {{ $patient['id'] }}</p>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-lg-6 col-xs-6">
          <address>
            <p><strong>Test Details</strong></p>
            <p>Test Name: {{ $test['name'] }}</p>
            <p>Test Code: {{ $test['code'] }}</p>
            <p>Sample ID: {{ $sample['id'] }}</p>
            <p>Report ID: {{ $report['id'] }}</p>
          </address>
        </div>

      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Normal</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($results))
                      @foreach($results as $result)
                        <tr>
                          <td>{{$result->name}}</td>
                          <td>{{$result->quantity}}</td>
                          <td>{{$result->unit}}</td>
                          <td>{{$result->normal}}</td>
                        </tr>
                        @endforeach
                        @endif
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


     <div class="row">
        <div class="col-xs-12">
          <h4>Remarks:</h4>
          <p>{{ $report['remarks'] }}</p>
        </div>
        <!-- /.col -->
      </div>


    </section>

</body>
</html>
