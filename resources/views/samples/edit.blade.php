@extends('layouts.admin')

@section('title') Pathology Lab | Home @endsection

@section('content_header')
<section class="content-header">
      <h1>
        Samples
        <small>Edit</small>
      </h1>
    </section>
@endsection

@section('main_content')

    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading">Edit Sample {{ $sample->id }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($sample, [
                            'method' => 'PATCH',
                            'url' => ['/admin/samples', $sample->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('samples.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('footer_content')

<script>
    var dateToday = new Date();
    var dates = $(".my-datepicker").datepicker({
        startDate: new Date(),
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        todayBtn: true,
        autoclose: true
    });
</script>

@endsection             