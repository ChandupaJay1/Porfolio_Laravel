<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #f9f9f9;
        }
        .header {
            background: #6366f1;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            background: white;
            padding: 20px;
            margin-top: 20px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #6366f1;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>New Contact Form Submission</h2>
    </div>
    <div class="content">
        <div class="field">
            <span class="label">Name:</span>
            <p>{{ $data['name'] }}</p>
        </div>
        <div class="field">
            <span class="label">Email:</span>
            <p>{{ $data['email'] }}</p>
        </div>
        <div class="field">
            <span class="label">Subject:</span>
            <p>{{ $data['subject'] }}</p>
        </div>
        <div class="field">
            <span class="label">Message:</span>
            <p>{{ $data['message'] }}</p>
        </div>
    </div>
</div>
</body>
</html>
