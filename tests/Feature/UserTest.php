<?php

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

it('a user can have many posts', function () {
    $user = User::factory()->create();
    Post::factory()->count(3)->create(['user_id' => $user->id]);
    expect(1)->toBe(1);

    expect($user->posts)->toHaveCount(3);
});

it('a user can have many comments', function () {
    $user = User::factory()->create();
    Comment::factory()->count(5)->create(['user_id' => $user->id]);

    expect($user->comments)->toHaveCount(5);
});
