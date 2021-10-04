@extends('layouts.master')
@section('css')
<style type="text/css">
    .bg-nav {
        margin-top: 0px!important;
        padding-top: 1.35rem;
        background: linear-gradient(to right bottom, #3f4756, #4a4a69, #634874, #834074, #a23567);
    }
</style>
@endsection
@section('bodyclass')
<body>
@endsection
@section('jumbotron')
    <div class="jumbotron jblight">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h1 class="display-4">@lang('messages.home.title')</h1>
                </div>
                <div class="col-md-3">
                    <div class="admin-item-img">
                        <a href="{{ url('/profile/' . Auth::user()->username) }}">
                            @if (!empty(Auth::user()->social_id))
                            <img src="{{ Auth::user()->avatar }}" class="admin-image rounded-circle">
                            @else
                            <img src="{{ url('/images/' . Auth::user()->avatar) }}" class="admin-image rounded-circle">
                            @endif
                        </a>
                    </div>
                    <a href="{{ url('/profile/' . Auth::user()->username) }}">
                        <p class="member-item-user">{{ Auth::user()->name }}</p>
                    </a>
                    <p class="member-item-text">{{ Auth::user()->username }}</p>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('content')
    <div class="container">
        @if (Auth::user()->is_admin)
        <div class="row ml-3 mr-3">
            <div class="col-12">
                <section class="admin admin-simple-sm p-3">
                    <h6> @lang('messages.home.logged') <a href="{{ url('/admin') }}">@lang('messages.home.admin')</a></h6>
                </section>
            </div>
        </div>
        @endif
        <div class="row m-3">
            @if (Auth::user()->is_admin)
            <div class="col-md-4">
                <a  href="{{ url('/home/add') }}" role="button" class="btn btn-lg btn-light btn-block btnhome mr-1 mb-2"> <i class="icon-plus icons"></i> <br> @lang('messages.home.addpost')</a>
            </div>
            @elseif ($setting->allow_users == '0')
            <div class="col-md-4">
                <a  href="{{ url('/home/add') }}" role="button" class="btn btn-lg btn-light btn-block btnhome mr-1 mb-2"> <i class="icon-plus icons"></i> <br> @lang('messages.home.addpost')</a>
            </div>
            @endif
            <div class="col-md-4">
                <a href="{{ url('/profile/' . Auth::user()->username) }}" role="button" class="btn btn-lg btn-light btn-block btnhome mr-1 mb-2"><i class="icon-user icons"></i> <br>@lang('messages.home.profile')</a>
            </div>
            <div class="col-md-4">
                <a href="{{ url('/') }}" role="button" class="btn btn-lg btn-light btn-block btnhome mr-1 mb-2"><i class="icon-home icons"></i> <br>@lang('messages.home.homepage')</a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/form.js') }}"></script>
@endpush