<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Sara's Boutique Management Suite</title>
    
    <!-- Google Fonts Matching Website -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;600;700&family=Cinzel:wght@600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: radial-gradient(circle at top right, #fcfaf7 0%, #f6efe4 50%, #ede3d1 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            color: #1f2937;
            margin: 0;
            padding: 1.5rem;
        }

        .login-card {
            background: #ffffff;
            border: 1px solid rgba(212, 175, 55, 0.4);
            border-radius: 24px;
            box-shadow: 0 25px 60px rgba(36, 0, 56, 0.08), 0 0 40px rgba(212, 175, 55, 0.12);
            width: 100%;
            max-width: 450px;
            padding: 3rem 2.5rem;
        }

        .brand-heading {
            font-family: 'Cinzel', serif;
            color: #b8860b;
            letter-spacing: 2px;
            font-weight: 700;
        }

        .form-control {
            background-color: #ffffff;
            border: 1px solid #d9cebe;
            color: #1f2937;
            border-radius: 12px;
            padding: 0.8rem 1rem;
            font-family: 'Poppins', sans-serif;
            font-size: 0.92rem;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            background-color: #ffffff;
            border-color: #d4af37;
            color: #111827;
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.22);
        }

        .input-group-text {
            background-color: #faf6ef;
            border-color: #d9cebe;
            color: #b8860b;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
        }

        .btn-gold {
            background: linear-gradient(135deg, #d4af37 0%, #b8860b 100%);
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            border: none;
            padding: 0.9rem;
            border-radius: 12px;
            letter-spacing: 0.5px;
            transition: all 0.25s ease;
            box-shadow: 0 6px 18px rgba(212, 175, 55, 0.3);
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, #e6c35c 0%, #c5961a 100%);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(212, 175, 55, 0.4);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="text-center mb-4">
            <img src="{{ asset('assets/img/logo1.png') }}" alt="Sara's Boutique" height="65" class="mb-3">
            <h3 class="brand-heading m-0">Sara's Boutique</h3>
            <p class="text-muted small mt-1" style="font-family: 'Poppins', sans-serif;">Couture Administrative Suite</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger py-2 px-3 rounded-3 small mb-3 border-0 bg-danger bg-opacity-10 text-danger">
                <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label small fw-semibold text-dark">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', 'admin@gmail.com') }}" required autofocus placeholder="admin@gmail.com">
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label small fw-semibold text-dark">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Enter admin password">
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" checked style="border-color: #d9cebe;">
                    <label class="form-check-label text-muted small" for="remember">Remember session</label>
                </div>
                <span class="text-muted small"><i class="bi bi-shield-check text-success me-1"></i> Encrypted Access</span>
            </div>

            <button type="submit" class="btn btn-gold w-100 mb-3">
                <i class="bi bi-box-arrow-in-right me-1"></i> Sign In to Dashboard
            </button>
        </form>

        <div class="text-center pt-3 border-top" style="border-color: #f3f0e8;">
            <a href="{{ route('home') }}" class="text-decoration-none small fw-semibold d-inline-flex align-items-center gap-1" style="color: #b8860b;">
                <i class="bi bi-arrow-left"></i> Return to Sara's Boutique Front Store
            </a>
        </div>
    </div>

</body>
</html>
