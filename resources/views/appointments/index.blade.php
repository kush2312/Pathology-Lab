@extends('layouts.user')
    
@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            @if(Session::has('flash_message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i>Success!</h4>
                    {!! session('flash_message') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="card">
        <h5 class="card-header">Appointments</h5>
        <div class="card-body">
            <a href="{{ url('/appointments/create') }}" class="btn btn-primary" title="Add New Appointment">Create New</a> 
            <br/>
            <br/>
            @if(isset($appointments))
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col"> Test Name </th>
                        <th scope="col"> Status </th>
                        <th scope="col"> Date </th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($appointments as $item)
                      <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->test->name }}</td>
                        @php
                            $color;
                            if($item->status == 'pending'){
                                $color = 'badge-info';
                            } elseif ($item->status == 'done') {
                                $color = 'badge-success';
                            } elseif ($item->status == 'processing') {
                                $color = 'badge-warning';
                            } else {
                                $color = 'badge-danger';
                            }
                        @endphp
                        <td><span class="badge {{ $color }}">{{ $item->status }}</span></td>
                        <td>{{ $item->date }}</td>
                        <td>
                            <a href="{{ url('/appointments/' . $item->id) }}" class="" title="View Appointment" data-toggle="tooltip">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                    <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </a>
                            {!! "&nbsp;" !!}
                            @if($item->status == 'pending')

                            <a href="{{ url('/appointments/' . $item->id . '/edit') }}" class="" title="Edit Appointment" data-toggle="tooltip">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                            {!! "&nbsp;" !!}
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/appointments', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                                {!! Form::button('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                  </svg>', array(
                                        'type' => 'submit',
                                        'class' => 'link',
                                        'title' => 'Delete Appointment',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                )) !!}
                            {!! Form::close() !!}
                            
                            @endif

                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="pagination-wrapper"> {!! $appointments->render() !!} </div>
            </div>
            @else
                <h3>No appointments</h3>
            @endif
        </div>
    </div>
</div>
@endsection