@extends('layouts.user')
@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header">Edit Appointment {{ $appointment->id }}</h5>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::model($appointment, [
                'method' => 'PATCH',
                'url' => ['/appointments', $appointment->id],
                'class' => 'form-horizontal',
                'files' => true
            ]) !!}

            @include ('appointments.form_edit', ['submitButtonText' => 'Update'])

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
