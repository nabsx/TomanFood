<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'TomanFood' ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e74c3c 0%, #e67e22 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .register-container {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            padding: 40px 30px;
            text-align: center;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #e74c3c;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #64748B;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #475569;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #CBD5E1;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #e74c3c;
        }

        .btn {
            background: linear-gradient(135deg, #e74c3c 0%, #e67e22 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 14px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.3s;
            margin-top: 10px;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .login-link {
            margin-top: 24px;
            font-size: 14px;
            color: #64748B;
        }

        .login-link a {
            color: #e74c3c;
            text-decoration: none;
            font-weight: 500;
        }

        .error-message {
            color: #EF4444;
            background-color: #FEE2E2;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .success-message {
            color: #10B981;
            background-color: #D1FAE5;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .password-wrapper {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #64748B;
        }

        .name-fields {
            display: flex;
            gap: 15px;
        }

        .name-fields .form-group {
            flex: 1;
        }
    </style>
</head>
<body>
    <?= $this->renderSection('content') ?>
</body>
</html>
