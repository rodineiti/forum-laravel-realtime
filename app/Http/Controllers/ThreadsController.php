<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\ThreadsRequest;

class ThreadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::orderBy('updated_at', 'desc')
            ->paginate();

        return response()->json($threads);
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
    public function store(ThreadsRequest $request)
    {
        $thread = new Thread;
        $thread->title = $request->title;
        $thread->body = $request->body;
        $thread->user_id = Auth::user()->id;
        $thread->save();

        return response()->json(['created' => 'success', 'data' => $thread]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('threads.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(ThreadsRequest $request, Thread $thread)
    {
        // chamada da policy de update passando a thread
        $this->authorize('update', $thread);
        $thread->title = $request->title;
        $thread->body = $request->body;
        $thread->update();

        //return response()->json(['updated' => 'success', 'data' => $thread]);
        return redirect('/threads/'.$thread->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
