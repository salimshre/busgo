<?php
$title = 'Login';
require_once __DIR__ . '/../partials/head.php';
?>

<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <div class="logo">
                <span class="logo-icon">🚌</span>
                <span class="logo-text"><?= APP_NAME ?></span>
            </div>
            <h1>Welcome Back</h1>
            <p>Sign in to your account</p>
        </div>

        <?php require_once __DIR__ . '/../partials/flash.php'; ?>

        <form method="POST" action="/login" class="auth-form">
            <?= Csrf::getTokenField() ?>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required 
                       value="<?= isset($_POST['email']) ? Helpers::escape($_POST['email']) : '' ?>"
                       placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required 
                       placeholder="Enter your password">
            </div>

            <button type="submit" class="btn btn-primary btn-full">Sign In</button>
        </form>

        <div class="auth-footer">
            <p>Don't have an account? <a href="/register">Sign up here</a></p>
            <div class="demo-info">
                <small>Demo Account: demo@seatgo.local / Demo@12345</small>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
