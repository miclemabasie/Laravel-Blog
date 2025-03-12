<div class="respond-wrapper">
    <div class="comment-respond">
        <h4 class="comment-title">Leave a Comment</h4>
        <p class="comment-subtitle">
            Your feedback is valuable for us. Your email
            will not be published.
        </p>
        <div class="mb-3"></div>
        <form class="comment-form" action="{{ route('post.comment', $post->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <textarea name="comment" id="comment" class="highlighted mb-3" placeholder="Your comment"
                        rows="8"></textarea>
                </div>
            </div>
            <input class="submit-btn" type="submit" value="Submit">
        </form>
    </div>
</div>