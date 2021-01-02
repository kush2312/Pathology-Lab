@extends('layouts.user')

@section('content')

<div class="container">
    <div class="card">
        <h5 class="card-header">Make payment for Invoice ID: {{ $invoice_id }}</h5>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::open(['url' => '/admin/payments', 'class' => 'form-horizontal', 'files' => true]) !!}

            @include ('payments.form')

            {!! Form::close() !!}

    
        </div>
    </div>
</div>    

@endsection


@section('footer_content')

<script>
    $('select').on('change', function (e) {
        
        var valueSelected = this.value;
        console.log('selected: ' + valueSelected);
        if (valueSelected == 'bkash') {

            $('.payment-bkash').fadeIn(300);
        } else {
            $('.payment-bkash').fadeOut(300);
        }

    });

</script>
@endsection