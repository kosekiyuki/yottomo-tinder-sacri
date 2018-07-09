@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }} ({{ $user->hometeam }},{{ $user->codingteam }})</h3>
                </div>
                <div class="panel-body">
                <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->name, 500) }}" alt="">
                </div>
            </div>
            <!--like button-->
            @include('user_like.like_button', ['user' => $user])
            <!--zuttomo button-->
            @include('user_like.zuttomo_button', ['user' => $user])
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li><a href="#">MyProfile</a></li>
                <li role="presentation" class="{{ Request::is('users/*/likings') ? 'active' : '' }}"><a href="{{ route('users.likings', ['id' => $user->id]) }}">Like <span class="badge"></span></a></li>
                <li><a href="#">Future</a></li>
                <li role="presentation" class="{{ Request::is('users/*/zuttomoings') ? 'active' : '' }}"><a href="{{ route('users.zuttomoings', ['id' => $user->id]) }}">ズッ友 <span class="badge"></span></a></li>
            </ul>
        </div>
    </div>
@endsection