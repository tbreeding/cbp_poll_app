@extends('layouts.app')
@section('content')
        <div class="content">
            @auth
                <h2>{{$poll->name}}</h2>
                <p>{{$poll->description}}</p>
                @yield('pollcontent')
            @endauth
        </div>
@endsection
   