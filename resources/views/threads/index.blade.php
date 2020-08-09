@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @forelse($threads as $thread)
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="row justify-content-between ml-1 mr-1">
                                <div>
                                    <a href="{{$thread->path()}}"><h4>{{$thread->title}}</h4></a></div>
                                <div>
                                    <strong>{{$thread->replies_count}} {{Str::plural('reply')}}</strong>
                                </div>
                            </div>
                        </div>
                            <div class="card-body">
                                <div class="body">{{$thread->body}}</div>
                                <hr>
                            </div>
                    </div>
                    @empty
                        <p>There are no relevant results at this time</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
