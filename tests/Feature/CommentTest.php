<?php

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use function Pest\Laravel\{actingAs, post};

it('authenticated users can comment on posts', function () {
    $post = Post::factory()->create(); // Create a post
    $user = User::factory()->create(); // Create a user

    actingAs($user); // Authenticate as the user

    $response = post(route('post.comment', $post), [
        'comment' => 'Valid Comment', // Send the comment
    ]);

    $response->assertRedirect(route('post.show', $post->id)); // Ensure redirect to post details
    expect(Comment::where('content', 'Valid Comment')->exists())->toBeTrue(); // Ensure the comment was saved
});


it('guests cannot comment on posts', function () {
    $post = Post::factory()->create();

    $response = post(route('post.comment', $post), [
        'comment' => 'Unauthorized comment'
    ]);

    $response->assertRedirect(route('login'));
});