@extends('layouts.user')
@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header">Appointments</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Invoice ID</th>
                            <th scope="col">Appointment ID</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status </th>
                            <th scope="col">Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                    @unless (count($invoices))
                        <p>You have no invoices</p>
                    @endunless


                    @foreach($invoices as $item)
                        <tr>
                            <td scope="row">{{ $item->id }}</td>
                            <td>{{ $item->appointment_id }}</td>
                            <td>{{ $item->amount }}</td>
                            @php
                                $color;
                                if($item->status == 'unpaid'){
                                    $color = 'badge-warning';
                                } elseif ($item->status == 'paid') {
                                    $color = 'badge-success';
                                } else {
                                    $color = 'badge-danger';
                                }
                            @endphp
                            <td><small class="badge {{ $color }}">{{ $item->status }}</small></td>
                            <td>
                                @if($item->status == 'paid') 
                                <a href="{{ url('/invoices/' . $item->id) }}" class="" data-toggle="tooltip" title="View Invoice">
                                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                        <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </a>
                                @else

                                <a href="{{ url('/invoices/' . $item->id) }}" class="" data-toggle="tooltip" title="View Invoice">
                                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                        <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </a>
                                {!! "&nbsp;" !!}

                                {!! Form::open([
                                    'method'=>'GET',
                                    'url' => ['/admin/payments/create'],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                                        </svg>', array(
                                            'type' => 'submit',
                                            'class' => '',
                                            'title' => 'Make Payment',
                                            'data-toggle' => 'tooltip',
                                    )) !!}
                                    {{ Form::hidden('invoice_id', $item->id) }}
                                {!! Form::close() !!}
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $invoices->render() !!} </div>
            </div>
        </div>
    </div>
</div>
@endsection