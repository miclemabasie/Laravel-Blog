<x-base-layout>
    <div id="main">
        <div class="section mt-7">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="blog-list">
                            <div class="blog-item single-content">
                                <img src="{{ asset($post->image_path) }}" alt="" />
                                <div class="info">
                                    <div class="title">
                                        <a href="post-detail.html">{{ $post->title }}</a>
                                    </div>
                                    <div class="meta">
                                        <ul>
                                            <li class="category">
                                                <a href="cat-lifestyle.html">Lifestyle</a>
                                            </li>
                                            <li class="author">By Admin</li>
                                            <li class="date">May 14, 2018</li>
                                            <li class="comment">4 Comments</li>
                                        </ul>
                                    </div>
                                    <p class="body-text">
                                        {{ $post->content }}
                                    </p>
                                    <div class="simple-line mt-5"></div>
                                    <div class="share">
                                        <div class="post-bottom">
                                            <div class="tag">
                                                <span>Tag:</span>
                                                <a href="#">lifestyle</a>
                                                <a href="#">music</a>
                                                <a href="#">rock</a>
                                            </div>
                                            <div class="share-iocn">
                                                <span class="icon"><a href="#"><i class="fa fa-facebook"></i></a></span>
                                                <span class="icon"><a href="#"><i class="fa fa-twitter"></i></a></span>
                                                <span class="icon"><a href="#"><i
                                                            class="fa fa-google-plus"></i></a></span>
                                                <span class="icon"><a href="#"><i
                                                            class="fa fa-pinterest"></i></a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comments">
                            <h4 class="comment-title">3 Comments</h4>
                            <p class="comment-subtitle">{{ $post->title }}</p>
                            <ol class="comment-list">
                                <!-- Go through all the posts comments -->

                                @foreach ($post->comments as $comment)
                                    <x-posts.comment-item :$comment :$post />
                                @endforeach
                            </ol>
                        </div>
                        <x-posts.comment-form :$post />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>