<?php
session_start();
 ?>

 <!DOCTYPE html>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login/Register</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
 </head>
<body>
<div class="logo-container">
    <img src="/public/pic/soloparent.png" alt="Logo" style="width:400px; height:auto;">
</div>

 <div class="flip-container" id="flip-container">
     <div class="flipper">
         <div class="front">
             <h2>Login</h2>
             <?php if (!empty($login_error)): ?>
                 <p style="color:red;"><?= htmlspecialchars($login_error) ?></p>
             <?php endif; ?>
             <form method="post" action="login.php">
                 <input type="hidden" name="action" value="login">
                 <label>Username:</label>
                 <input type="text" name="username" required>
                 <label>Password:</label>
                 <input type="password" name="password" required>
                 <button type="submit">Login</button>
             </form>
             <p>Don't have an account? 
                 <button class="toggle-link" id="show-register">Register</button>
             </p>
        </div>
        <div class="back">
            <h2>Register</h2>
            <?php if (!empty($register_error)): ?>
                <p style="color:red;"><?= htmlspecialchars($register_error) ?></p>
            <?php endif; ?>
            <form method="post" action="login.php">
                <input type="hidden" name="action" value="register">
                <label>Username:</label>
                <input type="text" name="username" required>
                <label>Password:</label>
                <input type="password" name="password" required>
                <label>Email:</label>
                <input type="email" name="email" required>
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? 
                <button class="toggle-link" id="show-login">Login</button>
            </p>
        </div>
    </div>
</div>

<script>
    const flipContainer = document.getElementById('flip-container');
    document.getElementById('show-register').onclick = function(e) {
        e.preventDefault();
        flipContainer.classList.add('flipped');
    };
    document.getElementById('show-login').onclick = function(e) {
        e.preventDefault();
        flipContainer.classList.remove('flipped');
    };
</script>
</body>
</html>
