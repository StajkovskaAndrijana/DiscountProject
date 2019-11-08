@extends('main')

@section('content')
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h4 class="grey">Admin Panel</h4>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="navbar-right">
                @auth
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                       <button class="btn header-inner-profile-btn text-left">
                            <span class="grey">{{ Auth::user()->name }}</span>
                        </button>
                    </a>
                    <div class="dropdown-menu user-dropdown dropdown-menu-right log_out" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <p>{{ __('Log Out') }}</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
</div>

<div class="navs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item active col-xs-6 col-sm-6">
                        <a class="nav-link" href="#home" data-toggle="tab">Компании кои купиле картичка</a>
                    </li>
                    <li class="nav-item col-xs-6 col-sm-6">
                        <a class="nav-link" href="#profile" data-toggle="tab">Компании кои нудат попуст</a>
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 tab-content">
                <div class="tab-pane active" id="home">
                    @include('admin_panel_sections.purchased_cards')
                </div>
                <div class="tab-pane fade" id="profile">
                    @include('admin_panel_sections.created_deal')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
