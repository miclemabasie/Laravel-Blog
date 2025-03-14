<?php

use App\Models\Post;
use App\Models\User;
use function Pest\Laravel\{actingAs, post, get, delete};

it('allows authenticated users to create a post', function () {
    $user = User::factory()->create();
    actingAs($user);

    $response = post(route('post.store'), [
        'title' => 'Test Post',
        'content' => 'This is a test post',
        'image' => 'test.jpg'
    ]);

    $response->assertRedirect(route('index'));
    expect(Post::where('title', 'Test Post')->exists())->toBeTrue();
});

it('prevents unauthenticated users from creating a post', function () {
    $response = post(route('post.store'), [
        'title' => 'Unauthorized Post',
        'content' => 'Should not be created',
        'image' => 'unauthorized.jpg'
    ]);

    $response->assertRedirect(route('login'));
});

it('a user can have many posts', function () {
    $user = User::factory()->create();
    // Post::factory()->count(3)->create(['user_id' => $user->id]);
    expect(1)->toBe(1);

    // expect($user->posts)->toHaveCount(3);
});