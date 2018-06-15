@extends('polldetail')
@section('pollcontent')
    <div class="content">
        <!-- Options -->
        @auth


                <!-- Results -->
                <form method="post" action="/vote/{{$poll->id}}">
                @foreach($polloptions as $option)
                    <div style="
                        display:flex;
                        justify-content: space-between;
                        width: 200px;
                    ">

                        <p>{{$option->name}}</p>
                        <input type="{{$option->choice_style}}" name="options" value="{{$option->id}}"/>
                    </div>

                @endforeach
                    <input type="submit" />
                    @csrf
                </form>
            @endauth
    </div>
@endsection