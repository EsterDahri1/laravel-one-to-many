@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex  flex-column align-items-center justify-content-center">

            <h1 class="py-5 portfolio text-center text-capitalize text-danger">Portfolio</h1>

            <a class="px-5 btn btn-danger text-white fs-6" href="{{ route('login') }}">{{ __('Get started') }}</a>
        </div>
    </div>
@endsection
