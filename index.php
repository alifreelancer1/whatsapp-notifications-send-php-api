<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Send Message</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .form-container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      width: 300px;
    }
    input, textarea, button {
      width: 100%;
      margin-top: 10px;
      padding: 10px;
      font-size: 16px;
    }
    button {
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <form method="POST" action="send.php">
      <label>Phone Number (with country code):</label>
      <input type="text" name="number" placeholder="+1234567890" required>

      <label>Message:</label>
      <textarea name="message" rows="4" required></textarea>

      <button type="submit">Send</button>
    </form>
  </div>
</body>
</html>
