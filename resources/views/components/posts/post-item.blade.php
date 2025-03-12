<div class="blog-item">
                                    <div class="blog-inner">
                                        <a href="{{ route('post.show', $post->id) }}">
                                            <div class="overlay"><i class="mdi-link-variant"></i></div>
                                            <img src="{{ asset('images/blog/blog_11.jpg') }}" alt="" />
                                        </a>
                                        <div class="info">
                                            <div class="title">
                                                <a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                                            </div>
                                            <div class="meta">
                                                <ul>
                                                    <!-- <li class="category"><a href="cat-lifestyle.html">Life</a></li> -->
                                                    <li class="author">By User</li>
                                                    <li class="date">{{ $post->created_at->format('F d, Y') }}</li>
                                                    <li class="comment">5 Comments</li>
                                                </ul>
                                            </div>
                                            <div class="text">
                                                <p>{{ Str::limit($post->excerpt, 150) }}</p>
                                            </div>
                                            <div class="simple-line"></div>
                                            <div class="share">
                                                <div class="post-bottom">
                                                    <div class="continue">
                                                        <a href="{{ route('post.show', $post->id) }}">Continue Reading
                                                            <span><i class="fa fa-long-arrow-right"></i></span></a>
                                                    </div>
                                                    <div class="share-iocn">
                                                        <span class="share">Share:</span>
                                                        <span class="icon"><a href="#"><i
                                                                    class="fa fa-facebook"></i></a></span>
                                                        <span class="icon"><a href="#"><i
                                                                    class="fa fa-twitter"></i></a></span>
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