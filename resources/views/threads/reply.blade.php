<div class="card my-3">
namespace App;
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div>
                <a href="/profiles/{{ $reply->owner->name }}">
                    {{$reply->owner->name}}
                </a>
                said {{$reply->created_at->diffForHumans()}}
            </div>
            <form method="post" action="/replies/{{$reply->id}}/favorites">
                @csrf
                <button type="submit" class="btn btn-dark" {{$reply->isFavorited() ? 'disabled' : ''}}>
                    {{$reply->favorites_count}} {{Str::plural('Favorite', $reply->favorites_count)}}
                </button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <article>
            <div class="body">{{$reply->body}}</div>
        </article>
        <hr>
    </div>
</div>
