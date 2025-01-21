<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Menambahkan Bootstrap melalui CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menambahkan Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #00aaff;
            font-family: Arial, sans-serif;
        }
        .login-card {
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .profile-img {
            width: 80px;
            height: 80px;
            background-color: #ddd;
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .profile-img img {
            max-width: 60%;
            border-radius: 50%;
        }
        h2 {
            color: #333333;
            font-weight: bold;
        }
        .form-label {
            color: #333333;
        }
        .btn-primary {
            background-color: #00cc66;
            border-color: #00cc66;
        }
        .btn-primary:hover {
            background-color: #00994d;
            border-color: #00994d;
        }
        .input-with-icon {
            position: relative;
        }
        .form-control-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #666;
            font-size: 1.2rem;
        }
        .input-with-icon input {
            padding-left: 40px; /* Memberikan ruang untuk ikon */
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-card text-center">
            <div class="profile-img">
                <img src="assets/img/profile.png" alt="Profile">
            </div>
            <h2>Login</h2>
            <form action="{{ url('login') }}" method="POST">
                @csrf
                <div class="mb-3 text-start input-with-icon">
                    <i class="bi bi-person form-control-icon"></i>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Username" required>
                </div>
                <div class="mb-3 text-start input-with-icon">
                    <i class="bi bi-lock form-control-icon"></i>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

    <!-- Menambahkan JS Bootstrap melalui CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
