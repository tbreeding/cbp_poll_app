@extends('layouts.app')
    @section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="pollList">
                    <h1>All Polls</h1>
                    @foreach ($polls as $poll)

                        <a href="#"> {{$poll->name}} - {{$poll->description}}</a>

                    @endforeach
                </div>

                @auth
                <div class="addPoll">
                    <h2>Add a new poll here</h2>

                    <form method="POST">
                        Name: <input type="text" name="name" />
                        Description: <textarea name="description"></textarea>
                        <input type="submit" value="Submit" />
                    </form>
                </div>
                @endauth
            </div>
        </div>
        @endsection
   