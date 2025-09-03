<?php
$title = 'Register';
require_once __DIR__ . '/../partials/head.php';
?>

<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <div class="logo">
                <span class="logo-icon">🚌</span>
                <span class="logo-text"><?= APP_NAME ?></span>
            </div>
            <h1>Create Account</h1>
            <p>Join SeatGo today</p>
        </div>

        <?php require_once __DIR__ . '/../partials/flash.php'; ?>

        <form method="POST" action="/register" class="auth-form">
            <?= Csrf::getTokenField() ?>
            
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required 
                       value="<?= isset($_POST['name']) ? Helpers::escape($_POST['name']) : '' ?>"
                       placeholder="Enter your full name">
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required 
                       value="<?= isset($_POST['email']) ? Helpers::escape($_POST['email']) : '' ?>"
                       placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required 
                       placeholder="Enter your password (min 8 characters)">
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required 
                       placeholder="Confirm your password">
            </div>

            <button type="submit" class="btn btn-primary btn-full">Create Account</button>
        </form>

        <div class="auth-footer">
            <p>Already have an account? <a href="/login">Sign in here</a></p>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
