<?php

namespace App\Http\Controllers;

use foo\bar;
use Illuminate\Http\Request;
use App\Thread;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }
    function store($channelId, Thread $thread)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $thread->addReply([
            'body' => request('body'),
           'user_id' => auth()->id()
        ]);
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
