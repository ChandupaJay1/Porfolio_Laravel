<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .admin-container { max-width: 800px; margin: 50px auto; padding: 20px; }
        .contact-card { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .field { margin-bottom: 20px; }
        .label { font-weight: bold; color: #6366f1; margin-bottom: 5px; display: block; }
        .value { color: #334155; }
        .message-box { background: #f8fafc; padding: 20px; border-radius: 5px; border-left: 4px solid #6366f1; }
    </style>
</head>
<body>
<div class="admin-container">
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.contacts.index') }}" class="btn">← Back to Contacts</a>
    </div>

    <div class="contact-card">
        <h1 style="margin-bottom: 30px;">Contact Message Details</h1>

        <div class="field">
            <span class="label">Name:</span>
            <p class="value">{{ $contact->name }}</p>
        </div>

        <div class="field">
            <span class="label">Email:</span>
            <p class="value">{{ $contact->email }}</p>
        </div>

        <div class="field">
            <span class="label">Subject:</span>
            <p class="value">{{ $contact->subject }}</p>
        </div>

        <div class="field">
            <span class="label">Received:</span>
            <p class="value">{{ $contact->created_at->format('F d, Y at h:i A') }}</p>
        </div>

        <div class="field">
            <span class="label">Message:</span>
            <div class="message-box">{{ $contact->message }}</div>
        </div>

        <div style="margin-top: 30px;">
            <a href="mailto:{{ $contact->email }}" class="btn">Reply via Email</a>
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn" style="background: #ef4444;" onclick="return confirm('Delete this message?')">Delete</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
