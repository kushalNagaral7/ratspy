<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['command'])) {
    $command = htmlspecialchars($_POST['command'], ENT_QUOTES, 'UTF-8');
    $message = "Request received: " . $command;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>RatSpy Admin Panel</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f0f0f0; }
        .container { background: white; padding: 20px; border-radius: 5px; }
        button { padding: 10px 20px; margin: 5px; cursor: pointer; }
    </style>
</head>
<body>
<div class="container">
    <h1>RatSpy Control Panel</h1>
    <h2>Connected Devices</h2>
    <p>No devices connected.</p>

    <h2>Support Requests</h2>
    <form method="POST">
        <input type="text" name="command" placeholder="Enter support request" required>
        <button type="submit">Submit Request</button>
    </form>

    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</div>
</body>
</html>
