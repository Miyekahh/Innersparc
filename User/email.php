<!DOCTYPE html>
<html lang="en">
<head>
  <title>Check email</title>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../Images/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <style>
    /* Overlay background */
.email {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

/* Modal box styling */
.modal {
    background-color: #fff;
    border-radius: 8px;
    width: 300px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Icon styling */
.icon img {
    width: 40px;
    height: 40px;
    margin-bottom: 10px;
    margin-right: 230px;
}

/* Modal header */
.modal h2 {
    font-size: 20px;
    color: #333;
    font-weight: bold;
    margin-bottom: 10px;
    margin-right: 100px;

}

/* Modal paragraph */
.modal p {
    font-size: 14px;
    color: #333;
    margin-bottom: 20px;
}

/* Button styling */
.login-button {
    background-color: #B49A44; /* Gold color */
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

/* Button hover effect */
.login-button:hover {
    background-color: #A3925B;
}

</style>
</head>
<body>

<div class="email">
    <div class="modal">
        <div class="icon">
            <img src="https://img.icons8.com/ios-filled/50/000000/new-post.png" alt="Email Icon">

        </div>
        <h2>Check your Emai!</h2>
        <p>We’ve sent you a link to reset your password.</p>
        <button class="login-button">Got it</button>
    </div>
</div>
</body>

