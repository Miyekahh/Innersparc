<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reset Password</title>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../Images/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
    }
    .reset-container {
      width: 300px;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      background-color: white;
      text-align: center;
    }
    .reset-container h2 {
      font-size: 20px;
      margin: 10px 0;
      color: #333;
    }
    .reset-container label {
      display: block;
      font-size: 14px;
      text-align: left;
      color: #333;
      margin-bottom: 5px;
      font-weight: bold;
    }
    .reset-container input[type="password"] {
      width: 280px;
      padding: 10px;
      margin: 10px 0;
      border-radius: 4px;
      border: 1px solid #ccc;
      background-color: #f7f7e8;
    }
    .reset-container button {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 4px;
      background-color: #B49A44;
      color: white;
      font-size: 16px;
      cursor: pointer;
    }
    .reset-container button:hover {
      background-color: #a58b57;
    }
  </style>
</head>
<body>
  <div class="reset-container">
    <h2>Reset your Password</h2>
    <form action="/reset-password" method="POST">
      <label for="new-password">New Password</label>
      <input type="password" id="new-password" name="new-password" placeholder="New Password" required>
      
      <label for="confirm-password">Confirm new password</label>
      <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm new password" required>
      
      <button type="submit">Save Changes</button>
    </form>
  </div>
</body>
</html>
