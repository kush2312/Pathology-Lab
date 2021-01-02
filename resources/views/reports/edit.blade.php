@extends('layouts.admin')

@section('title') Pathology Lab @endsection

@section('content_header')
<section class="content-header">
      <h1>
        Tests
        <small>Add New</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
@endsection

@section('main_content')

    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading">Edit Report {{ $report->id }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($report, [
                            'method' => 'PATCH',
                            'url' => ['/admin/reports', $report->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                            @if(isset($results))

                                @foreach($results as $field)
                                    <div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
                                        {!! Form::label( (string) $field->field_id, $field->name . ' (' . $field->unit . ')', ['class' => 'col-md-2 control-label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text( (string) $field->field_id, $field->quantity, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                @endforeach
                                
                            @endif

                            <div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
                                {!! Form::label('remarks', 'Remarks', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::textarea('remarks', $report['remarks'], ['class' => 'form-control']) !!}
                                    {!! $errors->first('remarks', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="box-footer">
                            {!! Form::submit('Update' , ['class' => 'btn btn-primary pull-right']) !!}
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection                