<x-auth-layout>
    <h2>Signup</h2>
    <form action="#" method="POST">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="name" required>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="input-group">
            <label for="password">Password Confirm</label>
            <input type="password" id="re-password" name="re-password" required>
        </div>
        <button type="submit">Signup</button>
    </form>
</x-auth-layout>