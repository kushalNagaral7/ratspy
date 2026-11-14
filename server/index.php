<?php
// server/index.php

// Check if a command is sent from the admin panel
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['command'])) {
 $command = $_POST['command'];
 // Logic to send command to connected socket client would go here
 // For this simple example, we just echo back
 echo "Command sent: ". htmlspecialchars($command);
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
 <p>Device 1 (192.168.1.105): Online</p>

 <h2>Send Commands</h2>
 <form method="POST">
 <input type="text" name="command" placeholder="Enter command (e.g. SCREEN_ON)" required>
 <button type="submit">Send Command</button>
 </form>

 <hr>
 <h3>Quick Actions</h3>
 <button onclick="sendCmd('SCREEN_ON')">Turn Screen On</button>
 <button onclick="sendCmd('SCREEN_OFF')">Turn Screen Off</button>
 <button onclick="sendCmd('GET_FILES')">Get Files</button>
 </div>

 <script>
 function sendCmd(cmd) {
 const form = document.createElement('form');
 form.method = 'POST';
 form.action = '';
 
 const input = document.createElement('input');
 input.type = 'hidden';
 input.name = 'command';
 input.value = cmd;
 
 form.appendChild(input);
 document.body.appendChild(form);
 form.submit();
 }
 </script>
</body>
</html>