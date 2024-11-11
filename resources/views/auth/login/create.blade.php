<x-guest-layout pageTitle="Login" bodyClass="page-login">
    <x-slot:heading>
        <h1 class="auth-page-title">Login</h1>
    </x-slot:heading>

    <form action="" method="post">
        <div class="form-group">
            <input type="email" placeholder="Your Email" />
        </div>
        <div class="form-group">
            <input type="password" placeholder="Your Password" />
        </div>
        <div class="text-right mb-medium">
            <a href="/password-reset.html" class="auth-page-password-reset"
            >Reset Password</a
            >
        </div>

        <button class="btn btn-primary btn-login w-full">Login</button>
    </form>

    <div class="login-text-dont-have-account">
        Don't have an account? -
        <a href="{{ route('signup.create') }}"> Click here to create one</a>
    </div>
</x-guest-layout>