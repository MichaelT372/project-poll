<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Poll;
use App\Option;
use App\Http\Requests;
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
         return redirect('poll/create');
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
    public function store(Request $request)
    {
        $poll = new Poll($request->all());

        $poll->save();

        $options = array_slice($request->all(), 2);

        foreach ($options as $value) {
            $option = new Option;

            $option->name = $value;

            $poll->options()->save($option);
        }

        $path = 'poll/' . $poll->id;

        return redirect($path);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($poll)
    {
        $poll = Poll::findOrFail($poll);

        return view('poll.show', compact('poll'));
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

    public function addVote($pollId, $optionId)
    {
        $poll = Poll::findOrFail($pollId);

        $option = Option::findOrFail($optionId);

        $option->votes += 1;

        $option->save();

        return view('poll.show', compact('poll'));
    }
}
