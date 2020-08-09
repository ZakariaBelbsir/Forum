<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */

    public function test_an_authenticated_user_may_participate_in_forum()
    {
        $this->signIn();
        $thread = create('App\Thread');
        $reply = create('App\Reply');
        $this->post($thread->path().'/replies', $reply->toArray());
        $this->get($thread->path())->assertSee($reply->body);
    }

    public function test_an_unauthenticated_user_may_not_participate_in_forum()
    {
        $this->withExceptionHandling()
        ->post('/threads/something/1/replies', [])
        ->assertRedirect('/login');
    }

    public function test_a_reply_requires_a_body()
    {
        $this->withExceptionHandling()->signIn();
        $thread = create('App\Thread');
        $reply = make('App\Reply', ['body' => null]);
        $this->post($thread->path() . '/replies',$reply->toArray() )
            ->assertSessionHasErrors('body');
    }
}
