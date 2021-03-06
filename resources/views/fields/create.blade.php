@extends('layouts.admin')

@section('title') Pathology Lab | Home @endsection

@section('content_header')

<section class="content-header">
      <h1>
        Test Field
        <small>Add New</small>
      </h1>
    </section>
    
@endsection

@section('main_content')

    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading">Create New Test Field</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/fields', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('fields.form')

                        {!! Form::close() !!}

                    </div>
                </div>
                
            </div>
        </div>
    </section>    

@endsection