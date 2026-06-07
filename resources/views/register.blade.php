<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header text-center">
                        <h3>Register Form</h3>
                    </div>

                    <div class="card-body">

                        {{-- Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="/register-user">
                            @csrf

                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Full Name</label>
                                <input type="text" name="full_name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" class="form-control">
                            </div>

                            <button class="btn btn-primary w-100">
                                Register
                            </button>
                        </form>

                        <div class="mt-3 text-center">
                            <a href="/login">Already have an account?</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>