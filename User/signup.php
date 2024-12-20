<?php
// database connection
$host = 'localhost';
$user = 'root'; // Your database username
$pass = ''; // Your database password
$db_name = 'userregister'; // Your database name

// Create connection
$conn = new mysqli($host, $user, $pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Login form
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);

        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // Login success
            echo "<script>alert('Login Successful');</script>";
        } else {
            // Login failed
            echo "<script>alert('Invalid Email or Password');</script>";
        }
    } elseif (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        // Signup form
        $username = $conn->real_escape_string($_POST['username']);

        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);

        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($query) === TRUE) {
            // Signup success
            echo "<script>alert('Signup Successful');</script>";
        } else {
            // Signup failed
            echo "<script>alert('Error: " . $query . "<br>" . $conn->error . "');</script>";
        }
    }
}

// Close connection
$conn->close();
?>
<?php
// Database connection and form handling code goes here as in your original script
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../Images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Existing styles for sign-up form */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }
        .container {
            display: flex;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: white;
            width: 700px;
        }
        .signup-form {
            padding: 20px;
            width: 300px;
        }
        .signup-form h2 {
            margin-top: 0;
            color: #333;
            text-align: center;
        }
        .signup-form input[type="text"],
        .signup-form input[type="email"],
        .signup-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            background-color: #f7f7e8;
        }
        .signup-form button {
            width: 320px;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #B49A44;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .signup-form button:hover {
            background-color: #a58b57;

        }
        .signup-form p {
            text-align: center;
            margin-top: 10px;
        }
        .signup-form a {
            color: #007bff;
            text-decoration: none;
            cursor: pointer;
        }
        .signup-form a:hover {
            text-decoration: underline;
        }
        .image-section {
            width: 300px;
            background-image: url('../images/forsale.jpg');
            background-size: cover;
            background-position: center;
            margin-left: 30px;
            margin-top: 18.5px;
        }

          .login-container {
      width: 300px;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      background-color: white;
      text-align: center;
    
    }

     .account img {
      width: 50px; 
      height: 50px;
      align-items: center;

}


        
        /* Modal styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .modal-content {
            background: white;
            padding: 20px;
            width: 350px;
            border-radius: 8px;
            text-align: center;
            position: relative;

        }
        .modal-content h2 {
            margin: 0 0 10px;
        }
        .modal-content input[type="email"],
        .modal-content input[type="password"] {
            width: 330px;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            background-color: #f7f7e8;
        }
        .modal-content button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #B49A44;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;

        }
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;


        }

        .forgot-password {
            color: #007bff;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
            display: block;
            margin-top: 10px;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }


        
    /* Email Modal styles */
    .email-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }
    .email-modal {
        background-color: #fff;
        border-radius: 8px;
        width: 300px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .email-modal .icon img {
        width: 40px;
        height: 40px;
        margin-bottom: 3px;
        text-align: left;
        margin-right: 260px;
                    }
    .email-modal h2 {
        font-size: 20px;
        color: #333;
        font-weight: bold;
        margin-bottom: 10px;
        text-align: left;

    }
    .email-modal p {
        font-size: 14px;
        color: #333;
        margin-bottom: 20px;
        text-align: left;
    }
    .email-modal .login-button {
        background-color: #B49A44;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        font-weight: bold;
        width: 250px;
        transition: background-color 0.3s ease;
    }
    .email-modal .login-button:hover {
        background-color: #A3925B;
    }

     /* Reset Password modal container */
    .reset-container {
      background-color: white;
      width: 300px;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    /* Reset Password form styling */
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

    /* Close button styling */
    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }

     .changed {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none; /* Initially hidden */
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal {
            background-color: #fff;
            border-radius: 8px;
            width: 310px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .icon img {
            width: 40px;
            height: 40px;
            margin-bottom: 10px;
            margin-right: 320px;
        }

        .modal h2 {
            font-size: 18px;
            color: black;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: left;
        }

        .modal p {
            font-size: 14px;
            color: #333;
            margin-bottom: 20px;
            text-align: left;
        }

        .login-button {
            background-color: #B49A44;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #A3925B;
        }


        
    </style>
</head>
<body>
    <div class="container">
        <div class="signup-form">
            <h2>Sign up to Inner SPARC Realty Services</h2>
            <form action="signup.php" method="POST">
                <input type="text" name="username" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Create Account</button>
            </form>
            <p>Already have an account? <a onclick="openModal()">Login</a></p>
        </div>
        <div class="image-section" style="height: 330px;"></div>
    </div>

    
    <div class="modal-overlay" id="loginModal">
        <div class="modal-content">
            <click class="close-button" onclick="closeModal()">x</click>
            <div class="account"> <img src="../images/account.png" aaccountlt="user"></div> 
            <h2>User Login</h2>
            <form action="/login" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <a class="forgot-password" onclick="openForgotPasswordModal()">Forgot Password?</a>
            <button type="submit">Login</button>
        </form>
            <p>Don't have an account? <a href="signup.php" class="signup-link">Sign up</a></p>
        </div>
    </div>

 <!-- Forgot Password Modal -->
    <div class="modal-overlay" id="forgotPasswordModal">

        <div class="modal-content">
          <click class="close-button" onclick="closeforgotPasswordModal()">x</click>
            <h2>Forgot Password?</h2>
            <p>Enter your details to receive a link.</p>
            <form action="/forgot_password" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <div class="pass"></div>
                <button onclick="openCheckEmailModal()">Reset 
                Password </button>
        </div></button>
            </form>
        </div>
    </div>

  <!-- Check Email Modal -->
    <div class="email-overlay" id="checkEmailModal">
        <div class="email-modal">

            <div class="icon">
                <img src="https://img.icons8.com/ios-filled/50/000000/new-post.png" alt="Email Icon">
            </div>
            <h2>Check your email!</h2>
            <p>We’ve sent you a link to reset your password.</p>
            <form action="/check-email" method="POST">
            <button class="login-button" onclick="openResetPasswordModal()">Got it</button>
         
        </div>
    </div>

     <!-- Reset Password Modal -->
  <div class="modal-overlay" id="resetPasswordModal">
    <div class="reset-container">

      <h2>Reset your Password</h2>
      <form action="/reset-password" method="POST">
        <label for="new-password">New Password</label>
        <input type="password" id="new-password" name="new-password" placeholder="" required>
        
        <label for="confirm-password">Confirm new password</label>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="" required>

        <button onclick="openPasswordChangedSuccessfullyModal()">Save changes</button>
      </form>
    </div>
  </div>
  <!-- PAssword Changed Modal -->
  <div class="changed" id="passwordChangedModal">
        <div class="modal">
            <div class="icon">
                <img src="https://img.icons8.com/ios-filled/50/000000/lock--v1.png" alt="Lock Icon">
            </div>
            <h2>Password Change Successfully!</h2>
            <p>Your password has been successfully updated.</p>
            <button class="login-button" onclick="window.location.href='signup.php?modal=login'">Log in</button>

        </div>
    </div>

  

    <script>

        function openModal() {
          closeModal();
            document.getElementById('loginModal').style.display = 'flex';
        }
        
        function closeModal() {
            document.getElementById('loginModal').style.display = 'none';
        }


        // Forgot pass functions

        function openForgotPasswordModal() {
          closeModal();
            document.getElementById('forgotPasswordModal').style.display = 'flex';
        }

        function closeForgotPasswordModal() {
            document.getElementById('forgotPasswordModal').style.display = 'none';
          
        }

        // Check Email Modal functions
        function openCheckEmailModal() {
            closeForgotPasswordModal();
            document.getElementById('checkEmailModal').style.display = 'flex';
        }

        function closeCheckEmailModal() {
            document.getElementById('checkEmailModal').style.display = 'none';
        }

         // Function to open the reset password modal
        function openResetPasswordModal() {
          document.getElementById('resetPasswordModal').style.display = 'flex';
        }

        function closeResetPasswordModal() {
            document.getElementById('resetPasswordModal').style.display = 'none';
        }




        // Function to open the password changed modal
        function openPasswordChangedSuccessfullyModal() {
         
            document.getElementById('passwordChangedModal').style.display = 'flex';
        }

        function closePasswordChangedSuccessfullyModal(){
          document.getElementById('passwordChangedModal').style.display = 'none';
        }

        // Function to redirect to login page after clicking "Log in"
        function redirectToLogin() {
            window.location.href = '/login'; // Adjust URL as needed
        }

        // Function to check URL parameters and open modals accordingly
        function openModalFromURL() {
        const urlParams = new URLSearchParams(window.location.search);
        const modal = urlParams.get('modal');
        
        if (modal === 'login') {
            openModal(); // Open the login modal
        } else if (modal === 'passwordChanged') {
            openPasswordChangedSuccessfullyModal(); // Open the password-changed modal if needed
        }
    }

        // Call this function on page load
        window.onload = openModalFromURL;




         
    </script>
</body>
</html>
