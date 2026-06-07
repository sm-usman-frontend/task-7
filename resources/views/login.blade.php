<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login Form</h3>
                    </div>

                    <div class="card-body">

                        {{-- Success Message --}}
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Error Message --}}
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="/login-user">
                            @csrf

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <button class="btn btn-success w-100">
                                Login
                            </button>
                        </form>

                        <div class="mt-3 text-center">
                            <a href="/forgot-password">Forgot Password?</a>
                        </div>

                        <div class="mt-2 text-center">
                            <a href="/register">Create Account</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>