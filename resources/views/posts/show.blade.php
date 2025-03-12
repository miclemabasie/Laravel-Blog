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

                                <li class="comment">
                                    <div class="content">
                                        <div class="comment-author">
                                            <img alt="author image" src="images/author/avatar.png" class="avatar" />
                                        </div>
                                        <div class="comment-content">
                                            <div class="meta">
                                                <h3 class="name">
                                                    Amelia Anderson
                                                </h3>
                                                <span class="time">Oct 02, 2018 @ 1:48
                                                    PM</span>
                                                <span class="divider">-</span>
                                                <span class="link"><a class="color" href="#">Reply</a></span>
                                            </div>
                                            <div class="text">
                                                <p>
                                                    Sed ut perspiciatis unde
                                                    omnis iste natus error sit
                                                    voluptatem accusantium
                                                    doloremque laudantium, totam
                                                    rem aperiam, eaque ipsa quae
                                                    ab illo inventore veritatis
                                                    et quasi architecto beatae
                                                    vitae dicta sunt explicabo.
                                                    Nemo enim ipsam voluptatem
                                                    quia voluptas sit aspernatur
                                                    aut odit aut fugit.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>
                        <div class="respond-wrapper">
                            <div class="comment-respond">
                                <h4 class="comment-title">Leave a Comment</h4>
                                <p class="comment-subtitle">
                                    Your feedback is valuable for us. Your email
                                    will not be published.
                                </p>
                                <div class="mb-3"></div>
                                <form class="comment-form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea name="comment" id="comment" class="highlighted mb-3"
                                                placeholder="Your comment" rows="8"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="highlighted" name="author" id="author"
                                                placeholder="Name (required)" />
                                        </div>
                                        <div class="col-md-4">
                                            <input type="email" class="highlighted" name="email" id="email"
                                                placeholder="Email (required)" />
                                        </div>
                                        <div class="col-md-4">
                                            <input type="url" class="highlighted" name="url" id="url"
                                                placeholder="Website" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="#" class="button mt-2">Submit Comment</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>