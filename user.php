<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-bottom: 20px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .login-container img {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container input[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .signup-container {
            display: none;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-top: 20px;
            text-align: center;
        }
        .signup-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .signup-container input[type="text"],
        .signup-container input[type="email"],
        .signup-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .signup-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .signup-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .login-container button {
            width: 100%;
            padding: 8px;
            background-color: blue;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-container button:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function toggleSignup() {
            var signupContainer = document.querySelector('.signup-container');
            if (signupContainer.style.display === 'none' || signupContainer.style.display === '') {
                signupContainer.style.display = 'block';
            } else {
                signupContainer.style.display = 'none';
            }
        }
        
        function logLoginAttempt() {
            console.log("Login attempt made");
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <img src="gammainterpharm brandin main logo x2.jpg" alt="Login Image">
        <form action="login.php" method="post" onsubmit="logLoginAttempt(); return false;">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <button onclick="toggleSignup()">Sign Up</button>
    </div>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form action="signup.php" method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>
