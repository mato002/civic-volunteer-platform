<?php
// This is a standalone registration view that can be saved as register.blade.php
// It uses Laravel's authentication system but doesn't extend any layout
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Organization Login - Training Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .card-header {
            padding: 1.5rem;
        }
        .card-body {
            padding: 2rem;
        }
        .card-footer {
            padding: 1rem;
            background-color: rgba(0, 0, 0, 0.03);
        }
        .btn-primary {
            padding: 0.5rem;
            font-weight: 500;
        }
        .form-check-label {
            user-select: none;
        }
    </style>
</head>
<body>
    <div class="login-card card shadow-sm">
        <div class="card-header text-center bg-primary text-white">
            <h4>Organization Login</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('org.login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input 
                      type="email" 
                      class="form-control @error('email') is-invalid @enderror" 
                      id="email" 
                      name="email" 
                      value="{{ old('email') }}" 
                      required 
                      autofocus>
                    @error('email')
                      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input 
                      type="password" 
                      class="form-control @error('password') is-invalid @enderror" 
                      id="password" 
                      name="password" 
                      required>
                    @error('password')
                      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
        <div class="card-footer text-center">
            <small>Don't have an account? <a href="{{ route('org.register') }}">Register here</a></small>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>