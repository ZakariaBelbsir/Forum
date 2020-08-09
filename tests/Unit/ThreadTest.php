<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;

    /** @return  */
    public function setUp():void
    {
        parent::setUp();
        $this->thread = create('App\Thread');
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_it_has_a_creator()
    {
        $this->assertInstanceOf('App\User', $this->thread->creator);
    }

    public function test_it_has_replies()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }


    public function test_it_can_add_A_reply()
    {
        $this->thread->addReply([
            'body' => 'FooBar',
            'user_id' => 1
        ]);
        $this->assertCount(1, $this->thread->replies);
    }

    public function test_it_belongs_to_a_channel()
    {
        $thread = create('App\Thread');
        $this->assertInstanceOf('App\Channel', $thread->channel);
    }

    public function test_it_can_make_a_string_path()
    {
        $thread = make('App\Thread');
        $this->assertEquals("/threads/{$thread->channel->slug}/{$thread->id}", $thread->path());
    }
}
