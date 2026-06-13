<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Penulis - Sistem Manajemen Blog</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, #f4f4f9 0%, #e8f5e9 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 420px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }
        .login-header {
            background-color: #2C3E50;
            color: white;
            text-align: center;
            padding: 32px 24px;
        }
        .login-header h4 {
            font-weight: 700;
            margin-bottom: 4px;
            letter-spacing: -0.02em;
        }
        .login-header p {
            font-size: 0.85rem;
            color: #bdc3c7;
            margin-bottom: 0;
        }
        .login-body {
            padding: 32px 28px;
        }
        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #34495e;
        }
        .form-control {
            border-radius: 10px;
            padding: 10px 14px;
            border: 1px solid #dcdde1;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }
        .form-control:focus {
            border-color: #2e7d32;
            box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.15);
        }
        .btn-login {
            background-color: #2e7d32;
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            transition: all 0.2s ease;
        }
        .btn-login:hover {
            background-color: #1b5e20;
            box-shadow: 0 4px 10px rgba(46, 125, 50, 0.2);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <h4>Sign In</h4>
            <p>Sistem Manajemen Blog (CMS)</p>
        </div>
        <div class="login-body">
            @if(session('sukses'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('sukses') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('gagal'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('gagal') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('login.proses') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user_name" class="form-label">Username</label>
                    <input type="text" 
                           class="form-control @error('user_name') is-invalid @enderror" 
                           id="user_name" 
                           name="user_name" 
                           value="{{ old('user_name') }}"
                           placeholder="Masukkan username Anda" 
                           required>
                    @error('user_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           id="password" 
                           name="password" 
                           placeholder="Masukkan password Anda" 
                           required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-login">Login</button>
            </form>
            
            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="text-decoration-none text-muted small">&larr; Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
