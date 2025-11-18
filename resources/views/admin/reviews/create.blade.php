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
                    <option value="5" {{ old('rating', 5) == 5 ? 'selected' : '' }}>5 Stars ★★★★★</option>
                    <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 Stars ★★★★☆</option>
                    <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 Stars ★★★☆☆</option>
                    <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 Stars ★★☆☆☆</option>
                    <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 Star ★☆☆☆☆</option>
                </select>
                @error('rating')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="is_approved" name="is_approved" value="1" {{ old('is_approved', 1) ? 'checked' : '' }}>
                <label for="is_approved" style="margin: 0;">Approved (visible on site)</label>
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', 1) ? 'checked' : '' }}>
                <label for="is_featured" style="margin: 0;">Featured on Homepage</label>
            </div>

            <button type="submit" class="btn" style="width: 100%; margin-top: 10px;">Add Review</button>
        </form>
    </div>
</div>
</body>
</html>
