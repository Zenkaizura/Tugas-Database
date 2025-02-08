<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>


  
  <div class="container">
    <h2 class="title-form">Register</h2>
    <form id="registerForm">
      <div class="input-group">
        <label for="reg-username">Username</label>
        <input type="text" id="reg-username" placeholder="Buatlah Username">
        <small class="error-message"></small>
      </div>

      <div class="input-group">
        <label for="reg-password">Password</label>
        <input type="password" id="reg-password" placeholder="Buatlah Password">
        <small class="error-message"></small>
      </div>

      <button type="button" onclick="validasiRegister()">Register</button>
      <p>Already have an account? <a href="Login.php">Login here</a></p>
    </form>
  </div>


  <div class="popup" id="errorPopup">
    <div class="popup-content">
      <h3>Error Detected</h3>
      <p>Harap Perhatikan masalah-masalah berikut ini:</p>
      <ul id="errorList">

      </ul>
      <button onclick="tutupPopup()">Close</button>
    </div>
  </div>
  


</body>
</html>
