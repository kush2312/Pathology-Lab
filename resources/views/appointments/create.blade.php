@extends('layouts.user')
@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header">Book Appointment</h5>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::open(['url' => '/appointments', 'class' => 'form-horizontal my-form', 'files' => true]) !!}

            {{ Form::hidden('patient_id', $patient->id) }}

                <div class="form-group {{ $errors->has('test_id') ? 'has-error' : ''}}">
                    {!! Form::label('test_id', 'Test', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                        {!! Form::select('test_id', $tests, null, ['class' => 'form-control', 'id' => 'test_name']) !!}
                        {!! $errors->first('test_id', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-2">
                        <p style="display: none;" class="slot_info">Your selected time slot is <small class="label bg-blue selected_slot"></small>
                        Please choose a date to see if its available</p>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                    {!! Form::label('date', 'Date', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                        {!! Form::text('date', null, ['class' => 'form-control my-datepicker']) !!}
                        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
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
                        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Book Appointment', ['class' => 'btn btn-primary form-btn']) !!}
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>  

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


<script>

    console.log(Lockr.get('test_id'));
    console.log(Lockr.get('slot_id'));
    
    var test_id = Lockr.get('test_id');
    var slot_id = Lockr.get('slot_id');
    var slot_time = Lockr.get('slot_time');
  
    if ( test_id != null) {
      $('#test_name').val(test_id);
    }
    if ( slot_id != null && slot_time != null) {
      $('.slot_info').show();
      $('.selected_slot').text(slot_time);
    }
  
    $('.form-btn').on('click', function(e){
  
      e.preventDefault();
      Lockr.flush();
      $('.my-form').submit();
    });
  
</script>

<script>
$('#test_name').on('change', function (e) {

    if( !$('.my-datepicker').val() ) return;

    fetchSlots();
});

$('.my-datepicker').on('changeDate', function (e) {

    if( !$('#test_name').val() ) return;

    fetchSlots();
});




function fetchSlots(){

    $('#loader').fadeIn(100);

    var test_id = $('#test_name').val();
    var date = $('.my-datepicker').val();

    console.log('test id: ' + test_id);
    console.log('date: ' + date);

    $.ajax({
       url: '/appointments/check',

       type: 'POST',

       dataType: 'json',

       data: {
          test_id: test_id,
          date: date

       },

       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

       error: function(data) {
          console.log(data);
          $('#loader').fadeOut(100);
          $('#loader').html('<p>Something went wrong!</p>');
       },

       success: function(data) {
          console.log(data);
          $('#loader').fadeOut(100);
          $('#slot_container > p').remove();
          showSlots(data);
       }
       
    });


}

function showSlots(data){

    if (data.status == 'all_busy') {
        $('#slot_container').html('<p style="color:red;">All slots are occupied! Please select another day.</p>');
    } else {

        // populate the radio input elements for slots
        var slots = data.slots;
        var html = ''
        for (var i = 0; i < slots.length; i++) {
            console.log(slots[i].time);
            //var el = '<input type="radio" name="slot" value="' + slots[i].id +'">' + slots[i].time + '<br>';
            html += '<span style="margin-right:5px;"><input type="radio" name="slot_id" value="' + slots[i].id +'">' + slots[i].time + '  </span>';
            //html.concat(el);
        }
        
        $('#slot_container').html(html);    
    }
    
}

</script>
@endsection