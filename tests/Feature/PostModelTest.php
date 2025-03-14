<?php


use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

it('a post belongs to a user', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $user->id]);


    expect($post->author->id)->toBe($user->id);
});


it('a post can have many comments', function () {
    $post = Post::factory()->create();
    Comment::factory()->count(3)->create(['post_id' => $post->id]);
    expect($post->comments)->toHaveCount(3);
});
