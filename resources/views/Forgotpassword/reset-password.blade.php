<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | E_Clothing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f5f5;
        }

        .reset-card {
            margin-top: 80px;
            border: none;
            border-radius: 12px;
        }

        .card-header {
            background: #198754;
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            padding: 18px;
        }

        .btn-reset {
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow reset-card">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Check if user is allowed to be here -->
                        @if(session()->has('reset_email'))
                            <form action="{{ route('reset.password.submit', ['token' => 'verified']) }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter New Password" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm Password" required>
                                </div>

                                <button type="submit" class="btn btn-success btn-reset">Reset Password</button>
                            </form>
                        @else
                            <div class="alert alert-warning">
                                Your session has expired or you are not authorized to reset the password.
                                <a href="{{ route('forgot.password') }}">Go back to forgot password</a>.
                            </div>
                        @endif

                        <hr>
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="text-decoration-none">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>