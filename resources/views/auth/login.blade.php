<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — SmartGate</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f1f5f9;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }
        .login-card {
            background: white;
            padding: 3rem;
            border-radius: 16px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.1);
            text-align: center;
            border-top: 6px solid #741b1b;
        }
        .brand {
            margin-bottom: 2rem;
        }
        .brand-logo {
            width: 100px;
            height: auto;
            margin-bottom: 1rem;
        }
        .brand-text {
            font-size: 2.25rem;
            font-weight: 800;
            color: #741b1b;
            letter-spacing: -1px;
        }
        .brand-text span {
            color: #f59e0b;
        }
        .form-group {
            text-align: left;
            margin-bottom: 1.5rem;
        }
        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 700;
            color: #64748b;
            margin-bottom: 0.5rem;
        }
        .form-input {
            width: 100%;
            padding: 0.875rem;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.2s;
            box-sizing: border-box;
            background: #f8fafc;
        }
        .form-input:focus {
            outline: none;
            border-color: #f59e0b;
            box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.1);
        }
        .btn-submit {
            width: 100%;
            padding: 1rem;
            background: #741b1b;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 800;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 0.5rem;
        }
        .btn-submit:hover {
            background: #5d1515;
            transform: translateY(-1px);
        }
        .footer {
            margin-top: 2rem;
            font-size: 0.8rem;
            color: #94a3b8;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }
        .footer img {
            height: 30px;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="brand">
            <img src="{{ asset('images/evsu-logo.png') }}" alt="EVSU" class="brand-logo">
            <div class="brand-text">Smart<span>Gate</span></div>
        </div>

        <p style="color: #64748b; margin-top: -1.5rem; margin-bottom: 2rem; font-size: 0.95rem;">Sign in to your account</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-input" placeholder="Enter username" required autofocus>
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn-submit">Sign In</button>
        </form>

        <div class="footer">
            <span>Powered by</span>
            <img src="{{ asset('images/chocobol-logo.png') }}" alt="Chocobol">
        </div>
    </div>

    @if(session('success'))
        <script>
            Swal.fire({ icon: 'success', title: 'Success!', text: "{{ session('success') }}", confirmButtonColor: '#741b1b' });
        </script>
    @endif
    @if(session('error'))
        <script>
            Swal.fire({ icon: 'error', title: 'Attention', text: "{{ session('error') }}", confirmButtonColor: '#741b1b' });
        </script>
    @endif
</body>
</html>
