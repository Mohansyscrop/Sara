<!DOCTYPE html>
<html>

<head>
    <title>Password Reset OTP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .otp {
            font-size: 20px;
            font-weight: bold;
            color: #d79e0d;
            text-align: center;
            margin: 20px 0;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Hello, {{ $user->name }}!</h2>
        <p>You requested a password reset. Use the OTP below to reset your password:</p>
        <div class="otp">{{ $otp }}</div>
        <p>This OTP is valid for 10 minutes. If you didn’t request this, please ignore this email.</p>
        <div class="footer">
            <p>Thank you,</p>
            {{-- <p>Your Website Team</p> --}}
        </div>
    </div>
</body>

</html>
