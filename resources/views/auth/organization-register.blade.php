<?php
// This is a standalone registration view that can be saved as register.blade.php
// It uses Laravel's authentication system but doesn't extend any layout
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            width: 400px;
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }
        .card-header {
            padding: 1.5rem;
        }
        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
        }
        .btn-success {
            background-color: #198754;
            border-color: #198754;
        }
        .btn-success:hover {
            background-color: #157347;
            border-color: #146c43;
        }
        .invalid-feedback {
            display: block;
        }
    </style>
</head>
<body>
    <div class="card shadow-sm">
        <div class="card-header text-center bg-success text-white">
            <h4>Organization Registration</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="/org/register">
                <div class="mb-3">
                    <label for="name" class="form-label">Organization Name</label>
                    <input 
                      type="text" 
                      class="form-control" 
                      id="name" 
                      name="name" 
                      required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input 
                      type="email" 
                      class="form-control" 
                      id="email" 
                      name="email" 
                      required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input 
                      type="password" 
                      class="form-control" 
                      id="password" 
                      name="password" 
                      required>
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
            <small>Already have an account? <a href="/organization/login">Login here</a></small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>