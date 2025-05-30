<?php
// This is a standalone registration view that can be saved as register.blade.php
// It uses Laravel's authentication system but doesn't extend any layout
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volunteer Registration - Training Manager</title>
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
        .register-card {
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .card-header {
            padding: 1.5rem;
            background-color: #28a745 !important;
        }
        .card-body {
            padding: 2rem;
        }
        .card-footer {
            padding: 1rem;
            background-color: rgba(0, 0, 0, 0.03);
        }
        .btn-success {
            padding: 0.5rem;
            font-weight: 500;
            background-color: #28a745;
            border-color: #28a745;
        }
        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }
        a {
            color: #28a745;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-card card shadow-sm">
        <div class="card-header text-center text-white">
            <h4>Volunteer Registration</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('volunteer.register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input 
                      type="text" 
                      class="form-control @error('name') is-invalid @enderror" 
                      id="name" 
                      name="name" 
                      value="{{ old('name') }}" 
                      required>
                    @error('name')
                      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input 
                      type="email" 
                      class="form-control @error('email') is-invalid @enderror" 
                      id="email" 
                      name="email" 
                      value="{{ old('email') }}" 
                      required>
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

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input 
                      type="password" 
                      class="form-control" 
                      id="password_confirmation" 
                      name="password_confirmation" 
                      required>
                </div>

                <button type="submit" class="btn btn-success w-100">Register</button>
            </form>
        </div>
        <div class="card-footer text-center">
            <small>Already have an account? <a href="{{ route('volunteer.login') }}">Login here</a></small>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>