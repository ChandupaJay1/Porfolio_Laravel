<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Contacts - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .admin-container { max-width: 1200px; margin: 50px auto; padding: 20px; }
        .admin-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #e2e8f0; }
    th { background: #6366f1; color: white; font-weight: 600; }
    tr:hover { background: #f8fafc; }
    .badge { padding: 5px 10px; border-radius: 5px; font-size: 0.85rem; }
        .badge-unread { background: #fef3c7; color: #92400e; }
    .badge-read { background: #d1fae5; color: #065f46; }
    .btn-small { padding: 5px 15px; font-size: 0.9rem; margin: 0 5px; }
        .btn-view { background: #3b82f6; color: white; }
    .btn-delete { background: #ef4444; color: white; }
    .alert { padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        .alert-success { background: #d1fae5; color: #065f46; }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>Contact Messages</h1>
            <a href="{{ route('home') }}" class="btn">← Back to Site</a>
        </div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Status</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ Str::limit($contact->subject, 30) }}</td>
            <td>
                            <span class="badge {{ $contact->is_read ? 'badge-read' : 'badge-unread' }}">
                                {{ $contact->is_read ? 'Read' : 'Unread' }}
                            </span>
            </td>
            <td>{{ $contact->created_at->format('M d, Y') }}</td>
            <td>
                <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-small btn-view">View</a>
                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-small btn-delete" onclick="return confirm('Delete this message?')">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" style="text-align: center; padding: 40px;">No contact messages yet</td>
        </tr>
    @endforelse
    </tbody>
</table>

<div style="margin-top: 20px;">
    {{ $contacts->links() }}
</div>
</div>
</body>
</html>

{{-- ============================================ --}}
{{-- FILE: resources/views/admin/contacts/show.blade.php --}}
{{-- ============================================ --}}

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

{{-- ============================================ --}}
{{-- FILE: resources/views/admin/reviews/index.blade.php --}}
{{-- ============================================ --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reviews - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .admin-container { max-width: 1200px; margin: 50px auto; padding: 20px; }
        .admin-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #e2e8f0; }
        th { background: #6366f1; color: white; font-weight: 600; }
        tr:hover { background: #f8fafc; }
        .badge { padding: 5px 10px; border-radius: 5px; font-size: 0.85rem; margin: 0 5px; }
        .badge-approved { background: #d1fae5; color: #065f46; }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-featured { background: #dbeafe; color: #1e40af; }
        .btn-small { padding: 5px 15px; font-size: 0.9rem; margin: 0 2px; }
        .btn-edit { background: #3b82f6; color: white; }
        .btn-delete { background: #ef4444; color: white; }
        .btn-toggle { background: #8b5cf6; color: white; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        .alert-success { background: #d1fae5; color: #065f46; }
    </style>
</head>
<body>
<div class="admin-container">
    <div class="admin-header">
        <h1>Client Reviews</h1>
        <div>
            <a href="{{ route('admin.reviews.create') }}" class="btn">+ Add Review</a>
            <a href="{{ route('home') }}" class="btn">← Back to Site</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Review</th>
            <th>Rating</th>
            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>
                    {{ $review->name }}
                    @if($review->company)
                        <br><small style="color: #64748b;">{{ $review->company }}</small>
                    @endif
                </td>
                <td>{{ Str::limit($review->review, 50) }}</td>
                <td><span class="stars" style="color: #fbbf24;">{{ $review->stars }}</span></td>
                <td>
                            <span class="badge {{ $review->is_approved ? 'badge-approved' : 'badge-pending' }}">
                                {{ $review->is_approved ? 'Approved' : 'Pending' }}
                            </span>
                    @if($review->is_featured)
                        <span class="badge badge-featured">Featured</span>
                    @endif
                </td>
                <td>{{ $review->created_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('admin.reviews.edit', $review) }}" class="btn btn-small btn-edit">Edit</a>
                    <form action="{{ route('admin.reviews.toggle-approval', $review) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-small btn-toggle">
                            {{ $review->is_approved ? 'Unapprove' : 'Approve' }}
                        </button>
                    </form>
                    <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-small btn-delete" onclick="return confirm('Delete this review?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 40px;">No reviews yet</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $reviews->links() }}
    </div>
</div>
</body>
</html>

{{-- ============================================ --}}
{{-- FILE: resources/views/admin/reviews/create.blade.php --}}
{{-- ============================================ --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Review - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .admin-container { max-width: 800px; margin: 50px auto; padding: 20px; }
        .form-card { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: 500; color: #1e293b; }
        input, textarea, select { width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 5px; font-family: inherit; }
        input:focus, textarea:focus, select:focus { outline: none; border-color: #6366f1; }
        .checkbox-group { display: flex; align-items: center; gap: 10px; }
        .checkbox-group input { width: auto; }
        .error { color: #ef4444; font-size: 0.9rem; margin-top: 5px; }
    </style>
</head>
<body>
<div class="admin-container">
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.reviews.index') }}" class="btn">← Back to Reviews</a>
    </div>

    <div class="form-card">
        <h1 style="margin-bottom: 30px;">Add New Review</h1>

        <form action="{{ route('admin.reviews.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" id="company" name="company" value="{{ old('company') }}">
                @error('company')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" id="position" name="position" value="{{ old('position') }}">
                @error('position')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="review">Review *</label>
                <textarea id="review" name="review" rows="5" required>{{ old('review') }}</textarea>
                @error('review')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="rating">Rating *</label>
                <select id="rating" name="rating" required>
                    <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 Stars</option>
                    <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 Stars</option>
                    <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 Stars</option>
                    <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 Stars</option>
                    <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 Star</option>
                </select>
                @error('rating')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="is_approved" name="is_approved" value="1" {{ old('is_approved') ? 'checked' : '' }}>
                <label for="is_approved" style="margin: 0;">Approved</label>
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                <label for="is_featured" style="margin: 0;">Featured on Homepage</label>
            </div>

            <button type="submit" class="btn" style="width: 100%; margin-top: 10px;">Add Review</button>
        </form>
    </div>
</div>
</body>
</html>
