<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poll;
use App\User;
use App\Vote;
use App\Polloption;
use Auth;

class PollsController extends Controller
{
    public function index() {
        
        return view('polls')->with('polls', Poll::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input['name'] = $request->name;
        $input['description'] = $request->description;
        $input['choice_style'] = $request->choice_style;
        $input['user_id'] = Auth::id();

        $poll = new Poll();
        $poll->fill($input);
        $poll->save();

        $po1['poll_id'] = $poll->id;
        $po2['poll_id'] = $poll->id;
        $po3['poll_id'] = $poll->id;
        $po4['poll_id'] = $poll->id;

        $po1['name'] = $request->op_1;
        $po2['name'] = $request->op_2;
        $po3['name'] = $request->op_3;
        $po4['name'] = $request->op_4;

        $po1['choice_style'] = $request->choice_style;
        $po2['choice_style'] = $request->choice_style;
        $po3['choice_style'] = $request->choice_style;
        $po4['choice_style'] = $request->choice_style;

/*        $po1['vote_count'] = $request->voute_count;
        $po2['vote_count'] = $request->voute_count;
        $po3['vote_count'] = $request->voute_count;
        $po4['vote_count'] = $request->voute_count;*/

        Polloption::create($po1);
        Polloption::create($po2);
        Polloption::create($po3);
        Polloption::create($po4);

        return redirect('/polls');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poll = Poll::find($id);
        $user = User::find(Auth::id());
        $polloptions = $poll->options;
        if (($user->voted()->where('poll_id', '=', $id)->get()) == null) {
            $hasvoted = [];
        } else {
            $hasvoted = $user->voted()->where('poll_id', '=', $id)->get();
        }
        // dd($hasvoted->all());
        if($hasvoted->all()) {
            return view('pollcontent.pollhasvoted', [
                'poll'=>$poll,
                'polloptions'=>$polloptions,
                'hasvoted'=>$hasvoted,
            ]);
        } else {
            return view('pollcontent.pollhasntvoted', [
                'poll'=>$poll,
                'polloptions'=>$polloptions,
                'hasvoted'=>$hasvoted,
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function vote(Request $request, $poll_id) {
        
        $input['poll_id'] = $poll_id;
        $input['poll_option_id'] = $request->options;
        $input['user_id'] = Auth::id();
        // dd($input);
        Vote::create($input);
        if(is_array($request->options)) {
            foreach($request->option as $option) {
                $po = Polloption::find($option)->vote_count;
                Polloption::find($option)->update(['vote_count'=>($po + 1)]);
            }
        } else {
            $po = Polloption::find($request->options)->vote_count;
                Polloption::find($request->options)->update(['vote_count'=>($po + 1)]);
        }
        // dd($polloptions);
        // Polloption::update('vote')
        return redirect('poll/'.$poll_id);
    }
}


