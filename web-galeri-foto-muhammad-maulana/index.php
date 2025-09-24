<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: url('foto4.jpg') no-repeat center center fixed;
      background-size: cover; /* biar gambar full screen */
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      background: rgba(255, 255, 255, 0.9); /* putih transparan */
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
      width: 350px;
      text-align: center;
      animation: fadeIn 0.8s ease;
    }

    .login-container h2 {
      margin-bottom: 20px;
      font-size: 26px;
      color: #333;
    }

    .login-container label {
      display: block;
      text-align: left;
      margin-top: 10px;
      color: #444;
      font-size: 14px;
      font-weight: 600;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      transition: 0.3s;
    }

    .login-container input:focus {
      border-color: #2193b0;
      outline: none;
      box-shadow: 0 0 5px rgba(33,147,176,0.5);
    }

    .login-container input[type="submit"] {
      width: 100%;
      padding: 12px;
      background: #2193b0;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 15px;
      transition: background 0.3s;
    }

    .login-container input[type="submit"]:hover {
      background: #176d80;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="proses_login.php" method="post"> 
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <input type="submit" value="Login">
    </form>
  </div>
</body>
</html>
