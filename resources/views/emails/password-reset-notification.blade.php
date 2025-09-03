<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Reset - AfayiGuide</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            background-color: #3B82F6;
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background-color: #f9fafb;
            padding: 30px;
            border-radius: 0 0 8px 8px;
        }
        .password-box {
            background-color: #FEF3C7;
            border: 2px solid #F59E0B;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
        }
        .password {
            font-size: 24px;
            font-weight: bold;
            color: #92400E;
            font-family: monospace;
            letter-spacing: 2px;
        }
        .warning {
            background-color: #FEE2E2;
            border: 1px solid #FCA5A5;
            border-radius: 6px;
            padding: 15px;
            margin: 20px 0;
        }
        .button {
            display: inline-block;
            background-color: #3B82F6;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #E5E7EB;
            color: #6B7280;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🔐 Password Reset Complete</h1>
        <p>Your AfayiGuide account password has been reset</p>
    </div>
    
    <div class="content">
        <h2>Hello {{ $user->name }},</h2>
        
        <p>Your password reset request has been processed successfully. Your account password has been reset to a temporary default password.</p>
        
        <div class="password-box">
            <h3>Your New Temporary Password:</h3>
            <div class="password">{{ $newPassword }}</div>
        </div>
        
        <div class="warning">
            <h3>⚠️ Important Security Notice:</h3>
            <ul>
                <li>This is a temporary password</li>
                <li>Please log in immediately and change your password</li>
                <li>Do not share this password with anyone</li>
                <li>For security reasons, please change this password as soon as possible</li>
            </ul>
        </div>
        
        <p><strong>Next Steps:</strong></p>
        <ol>
            <li>Click the button below to log in to your account</li>
            <li>Go to your profile settings</li>
            <li>Change your password to something secure and memorable</li>
            <li>Log out and log back in with your new password</li>
        </ol>
        
        <div style="text-align: center;">
            <a href="{{ route('login') }}" class="button">Log In to Your Account</a>
        </div>
        
        <p>If you have any questions or concerns, please contact our support team.</p>
        
        <p>Best regards,<br>
        The AfayiGuide Team</p>
    </div>
    
    <div class="footer">
        <p>This email was sent because a password reset was requested for your AfayiGuide account.</p>
        <p>If you did not request this password reset, please contact us immediately.</p>
        <p>&copy; {{ date('Y') }} AfayiGuide. All rights reserved.</p>
    </div>
</body>
</html>
