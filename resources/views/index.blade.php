<x-base-layout>
    <div id="main">
        <div class="section mt-7">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="blog-list">
                            @foreach ($posts as $post)
                                <x-posts.post-item :$post />
                            @endforeach
                        </div>

                        <!-- Pagination Links -->
                        <div class="pagination">
                            {{ $posts->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>