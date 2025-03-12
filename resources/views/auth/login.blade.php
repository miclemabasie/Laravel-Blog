<x-auth-layout>
    <h2>Login</h2>
    @isset($login)
        {{ $login }}
    @endisset
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="input-group">
            <label for="name">Username</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @error('password') <small class="error">{{ $message }}</small> @enderror
        </div>

        <button type="submit">Login</button>

        <p class="redirect-text">Don't have an account? <a href="{{ route("signup") }}">Singup</a></p>
    </form>
</x-auth-layout>