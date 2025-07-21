@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            <h4> User Profile </h4>
            @include('shared.user-card')
            <hr>
        </div>
        <div class="col-3">

        </div>
    </div>
@endsection
