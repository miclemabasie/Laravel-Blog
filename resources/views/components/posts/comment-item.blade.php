<li class="comment">
    <div class="content">
        <div class="comment-author">
            <img alt="author image" src="/images/author/avatar.png" class="avatar" />
        </div>
        <div class="comment-content">
            <div class="meta">
                <h3 class="name">
                    {{ $comment->user->name }}
                </h3>
                <span class="time">Oct 02, 2018 @ 1:48
                    PM</span>
                <span class="divider">-</span>
                <span class="link"><a class="color" href="#">Reply</a></span>
            </div>
            <div class="text">
                <p>
                    {{ $comment->content }}
                </p>
            </div>
        </div>
    </div>
    @if ($comment->user_id == Auth::id())

        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" style="border:none; background:none; color:red; cursor:pointer;">Delete</button>
    @endif
    </form>
</li>