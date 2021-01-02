@extends('layouts.user')

@section('content')
<div class="container" style="height: 100%; ">
    <div class="card">
        <div class="card-header" style="text-align: center;">Welcome {{ Auth::user()->name }}</div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">ID</th><td>{{ Auth::user()->id }}</td>
                        </tr>
                        <tr><th scope="row"> Name </th><td> {{ Auth::user()->name }} </td></tr>
                        <tr><th scope="row"> Email </th><td> {{ Auth::user()->email }} </td></tr>
                        <tr><th scope="row"> Account created on </th><td> {{ Auth::user()->created_at }} </td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
