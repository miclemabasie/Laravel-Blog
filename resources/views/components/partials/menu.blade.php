<div id="menu-bar">
    <ul id="menu-primary-menu" class="menu">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="cat-lifestyle.html">Life Style</a>
        </li>

        @auth
            <li>
                <a href="{{ route('post.create') }}">Create Post</a>
            </li>

            <li>
                <a href="{{ route('profile', ['id' => Auth::id()]) }}">Profile</a>
            </li>

            <li>
                <a href="{{ route('logout') }}">Logout</a>
            </li>
        @else
            <li>
                <a href="{{ route('login') }}">Login</a>
            </li>
        @endauth
    </ul>
</div>