<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card">
                    <div class="card-header text-center">
                        <h3>Forgot Password</h3>
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

                        <form method="POST" action="/forgot-password-user">
                            @csrf

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <button class="btn btn-warning w-100">
                                Send Reset Link
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>