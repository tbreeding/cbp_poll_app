@extends('layouts.app')
    @section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="pollList">
                    <h1>All Polls</h1>
                    @foreach ($polls as $poll)

                        <a href="polls/{{$poll->id}}"> {{$poll->name}} - {{$poll->description}}</a>

                    @endforeach
                </div>

                @auth
                <div class="addPoll">
                    <h2>Add a new poll here</h2>

                    <form method="POST">
                        Name: <input type="text" name="name" />
                        Description: <textarea name="description"></textarea>
                        <div style="
                            display: flex;
                            flex-direction: column;
                            justify-content: space-between;
                            align-items: center;
                            width: 100%;
                            padding: 5px;
                        ">
                        <p style="margin: 0 5px">Option 1</p>
                        <input type="text" name="op_1" />
                        <p style="margin: 0 5px">Option 2</p>
                        <input type="text" name="op_2" />
                        <p style="margin: 0 5px">Option 3</p>
                        <input type="text" name="op_3" />
                        <p style="margin: 0 5px">Option 4</p>
                        <input type="text" name="op_4" />
                        </div>

                        <div style="
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            width: 100%;
                            padding: 5px;
                        ">
                            <h5 style="margin: 0 5px">Answer Type:</h5>
                            <input type="radio" value="radio" name="choice_style" />
                            <p style="margin: 0 5px">Single-answer</p>
                            <input type="radio" value="checkbox" name="choice_style"/>
                            <p style="margin: 0 5px">Multiple-choice</p>
                        </div>
                        <input type="submit" value="Submit" />
                    </form>
                </div>
                @endauth
            </div>
        </div>
        @endsection
   