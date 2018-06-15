@extends('layouts.app')
@section('content')
        <div class="content">
            @auth
            <h4>You already Voted!!</h4>
                <h2>{{$poll->name}}</h2>
                <p>{{$poll->description}}</p>

                <!-- Results -->
                
                @foreach($polloptions as $option)
                    <div style="
                        display:flex;
                        justify-content: space-between;
                    ">
                        <p>{{$option->name}}<p>
                        <p>{{$option->vote_count}}</p>
                    </div>

                @endforeach
            @endauth
        </div>
@endsection
   