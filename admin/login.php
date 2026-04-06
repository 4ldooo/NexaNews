<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #0f172a;
    color: #f8fafc;
    display: flex;
    height: 100vh;
    align-items: center;
    justify-content: center;
    font-family: 'Segoe UI', sans-serif;
}

.card {
    background: #1e293b;
    border-radius: 15px;
    padding: 30px;
    width: 350px;
}

.btn-login {
    background: #f59e0b;
    border: none;
    color: black;
}
</style>
</head>

<body>

<div class="card">
    <h3 class="text-center mb-3" style="color: #f8fafc;">Login Admin</h3> 

    <?php if(isset($_GET['error'])){ ?>
<div class="alert alert-danger">
    Username atau password salah!
</div>
<?php } ?>

    <form action="proses_login.php" method="POST">
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>

        <div class="mb-3 position-relative">
    <label>Password</label>
    <input id="password" name="password" type="password" class="form-control" placeholder="Masukkan password" required>

    <span onclick="togglePassword()" 
    style="position:absolute; right:15px; top:31px; cursor:pointer;">
        👁️
    </span>
</div>

        <button class="btn btn-login w-100">Login</button>
    </form>
</div>


<script>
function togglePassword() {
    const pw = document.getElementById("password");

    if (pw.type === "password") {
        pw.type = "text";
    } else {
        pw.type = "password";
    }
}
</script>
</body>
</html>