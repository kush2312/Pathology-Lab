
{{ Form::hidden('patient_id', $appointment->patient_id) }}

<div class="form-group {{ $errors->has('test_id') ? 'has-error' : ''}}">
    {!! Form::label('test_id', 'Test', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('test_id', $tests, $appointment->test_id, ['class' => 'form-control', 'id' => 'test_name']) !!}
        {!! $errors->first('test_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    {!! Form::label('date', 'Date', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('date', $appointment->date, ['class' => 'form-control my-datepicker']) !!}
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    {!! Form::label('', 'Selected slot', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <p>{{ $slot }}</p>
    </div>
</div>

<div class="form-group {{ $errors->has('slot') ? 'has-error' : ''}}">
    {!! Form::label('', 'Available slots', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <p class="help-block" id="slot_container">
            <div id="loader" style="display:none">
                <img src="/img/rolling.gif" alt=""><span> Checking available slots...</span>
            </div>
             
        </p>
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-2 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>