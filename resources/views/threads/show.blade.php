@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header ">
                        <div class="row justify-content-between align-items-center">
                            <div>
                                <a href="/profiles/{{ $thread->creator->name }}">{{$thread->creator->name}}</a>
                                posted:
                                {{$thread->title}}
                            </div>
                            @can('update', $thread)
                            <div>
                                <form action="{{ $thread->path() }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn">Delete</button>
                                </form>
                            </div>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                            <article>
                                <div class="body">{{$thread->body}}</div>
                            </article>
                            <hr>
                    </div>
                </div>
                @foreach($replies as $reply)
                    @include('threads.reply')
                @endforeach
                {{ $replies->links() }}
                @auth
                <form class="mt-4" action="{{route('add_reply', [$thread->channel->slug,$thread->id])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="body" class="form-control" id="body" rows="5" placeholder="Have something to say?"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
                @endauth
                @guest
                    <p>Please<a href="{{route('login')}}"> log in </a>to participate </p>
                @endguest
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                            <p>
                               This thread was published {{ $thread->created_at->diffForHumans() }} by
                               <a href="#">{{ $thread->creator->name }}</a>,
                               and currently has {{ $thread->replies_count }} {{ Str::plural('comment', $thread->replies_count) }}.
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
