<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIA Login</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #0e0f0f;
        }

        .login-container {
            background: #1b1b18;
            border-radius: 10px;
            padding: 30px;
            width: 400px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .login-container img {
            width: 80px;
            margin-bottom: 20px;
        }

        .login-title {
            font-size: 18px;
            color: #fff;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        .login-form input {
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #333;
            border-radius: 5px;
            background-color: #2c2c2c;
            color: #fff;
        }

        .login-form input::placeholder {
            color: #aaa;
        }

        .login-btn {
            padding: 12px;
            background-color: #004aad;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #005eb8;
        }

        .footer-text {
            margin-top: 10px;
            font-size: 12px;
            color: #aaa;
        }

        .footer-text a {
            color: #ff453a;
            text-decoration: none;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }

        .bg-worldmap {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/path-to-your-world-map-image.jpg'); /* Update this with the actual path to the world map */
            background-size: cover;
            background-position: center;
            filter: blur(8px);
            z-index: -1;
        }
    </style>
</head>
<body>

    <div class="bg-worldmap"></div>

    <div class="login-container">
        <img src="cia-logo.png" alt="CIA Logo">
        <h2 class="login-title">CIA LOGIN</h2>

        <div class="login-form">
            <input type="text" placeholder="Agent ID">
            <input type="password" placeholder="Password">
            <button class="login-btn">Log In</button>
        </div>

        <p class="footer-text">
            You are entering a secured United States Government system, which may be used only for authorized purposes. Modification of any information on this system is subject to criminal prosecution. The agency monitors all usage of this system. All persons are hereby notified that use of this system constitutes consent to such monitoring and auditing.
        </p>
    </div>

</body>
</html>
