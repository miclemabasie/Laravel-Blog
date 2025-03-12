<x-auth-layout>
    <h2>Signup</h2>
    <form action="{{ route('signup.post') }}" method="POST">
        @csrf
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="name" value="{{ old('name') }}" required>
            @error('name') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @error('password') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="input-group">
            <label for="password_confirmation">Password Confirm</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">Signup</button>
        <p class="redirect-text">Already have an account? <a href="{{ route("login") }}">Login</a></p>

    </form>
</x-auth-layout>