<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Poll;
use App\Option;
use App\Voter;
use App\Http\Requests;
use App\Http\Requests\StorePoll;
use App\Http\Requests\VoteOnPoll;
use App\Http\Controllers\Controller;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::latest()->take(5)->get();

        return view('poll.latest', compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePoll $request)
    {
        $poll = Poll::create($request->all());

        $options = collect($request->input('options'))->map(function($value){
                    return new Option(['name' => $value]);
                });
        $poll->options()->saveMany($options);

        session()->flash('flash_message', [
			'title' => 'Success!',
			'message' => 'Your poll has been created.',
			'type' => 'success'
		]);

        return redirect('poll/' . $poll->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $poll = Poll::whereSlug($slug)->firstOrFail();

        return view('poll.show', compact('poll'));
    }

    public function vote(VoteOnPoll $request)
    {
        $poll = Option::findOrFail($request->input('option.0'))->poll;

        foreach ($request->input('option') as $option) {
            Option::findOrFail($option)->increment('votes');
        }

        if ($poll->ip_checking == 1) {
            $voter = Voter::create([
                'poll_id' => $poll->id,
                'ip_address' => $request->ip()
            ]);
        }

        session()->flash('flash_message', [
            'title' => 'Success!',
            'message' => 'Your vote has been counted.',
            'type' => 'success'
        ]);

        return redirect('poll/' . $poll->slug . '/result');
    }

    public function result($slug)
    {
        $poll = Poll::whereSlug($slug)->firstOrFail();

        return view('poll.result', compact('poll'));
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
}
