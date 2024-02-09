<h1>Register</h1>

<form action="{{ route('register') }}" method="post">
    @csrf
    <!-- Name -->
    <label for="name">Name</label>
    <input type="text" name="nama" id="name" />
    @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <!-- Email-->
    <label for="email">Email</label>
    <input type="email" name="email" id="email" />
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <!-- Password -->
    <label for="password">Password</label>
    <input type="password" name="password" id="password" />
    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <!-- No Hp -->
    <label for="no_telp">No Hp</label>
    <input type="no_telp" name="no_telp" id="no_telp" />
    @error('no_telp')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <!-- Confirm password -->
    <label for="password_confirmation">Confirm password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" />
    @error('password_confirmation')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <!-- Submit button -->
    <button type="submit">Register</button>
</form>
