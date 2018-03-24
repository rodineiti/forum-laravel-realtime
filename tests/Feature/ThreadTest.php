<?php

namespace Tests\Feature;

use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
	use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testActionIndexController()
    {
    	$user = factory(\App\User::class)->create();
    	$this->seed('ThreadsTableSeeder');

    	$threads = Thread::orderBy('updated_at', 'desc')
            ->paginate();

        $response = $this->actingAs($user)->json('GET', '/threads');

        $response->assertStatus(200);
        $response->assertJsonFragment([$threads->toArray()['data']]);
    }

    public function testActionStoreController()
    {
    	$user = factory(\App\User::class)->create();
    	
        $response = $this
            ->actingAs($user)
            ->json('POST', '/threads', [
                'title'=>'Meu primeiro tópico',
                'body'=>'este é um exemplo de tópico via test'
            ]);

        $thread = Thread::find(1);

        $response->assertStatus(200)->assertJsonFragment(['created' => 'success'])->assertJsonFragment([$thread->toArray()]);
    }

    public function testActionUpdateController()
    {
        $user = factory(\App\User::class)->create();
        $thread = factory(\App\Thread::class)->create([
            'user_id' => $user->id
        ]);
        
        $response = $this
            ->actingAs($user)
            ->json('PUT', '/threads/'.$thread->id, [
                'title'=>'Meu primeiro tópico atualizado',
                'body'=>'este é um exemplo de tópico via test atualizado'
            ]);

        $thread->title = 'Meu primeiro tópico atualizado';
        $thread->body = 'este é um exemplo de tópico via test atualizado';

        $response->assertStatus(302);
        $this->assertEquals(Thread::find(1)->toArray(), $thread->toArray());
    }
}
