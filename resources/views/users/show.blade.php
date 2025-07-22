@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            <h4> User Profile </h4>
            @if($editing ?? false)
                @include('shared.user-edit-card')
            @else
                @include('shared.user-card')
            @endif
            <hr>
        </div>
        <div class="col-3">

        </div>
    </div>
@endsection
