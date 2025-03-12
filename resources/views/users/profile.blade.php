<x-base-layout>
    <div class="profile-container">
        <div class="profile-header">
            <h2>{{ $user->name }}'s Profile</h2>
            <p>Email: {{ $user->email }}</p>
            <p>Joined: {{ $user->created_at->format('M d, Y') }}</p>
        </div>

        <div class="profile-posts">
            <h3>My Posts</h3>

            @if ($posts->count() > 0)
                <ul class="post-list">
                    @foreach ($posts as $post)
                        <li class="post-item">
                            <a href="{{ route('post.show', $post->id) }}">
                                <h4>{{ $post->title }}</h4>
                            </a>
                            <p>{{ Str::limit($post->content, 150) }}</p>
                            <p>
                                <a href="{{ route('post.show', $post->id) }}">Read More </a>
                                <span>|</span>
                                <a href="{{ route('post.edit', $post->id) }}">Edit</a>
                                <span>|</span>

                                <!-- Delete Post Form -->
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    style="border:none; background:none; color:red; cursor:pointer;">Delete</button>
                            </form>
                            </p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>You haven't posted anything yet.</p>
            @endif
        </div>
    </div>
</x-base-layout>