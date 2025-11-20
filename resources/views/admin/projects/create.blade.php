@extends('admin.layout')

@section('title', 'Add Project')
@section('page-title', 'Add New Project')

@section('header-actions')
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">← Back</a>
@endsection

@section('content')
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <div class="card-body" style="padding: 2rem;">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Project Title *</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                    @error('title')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                    @error('description')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <div class="row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="icon">Icon/Emoji *</label>
                        <input type="text" id="icon" name="icon" class="form-control" value="{{ old('icon', '💻') }}" placeholder="💻" required>
                        <small style="color: #64748b;">Use an emoji (e.g., 🛒, 📱, 💻)</small>
                        @error('icon')<div class="error-message">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="order">Display Order</label>
                        <input type="number" id="order" name="order" class="form-control" value="{{ old('order', 0) }}">
                        @error('order')<div class="error-message">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="tags">Tags * (comma separated)</label>
                    <input type="text" id="tags" name="tags" class="form-control" value="{{ old('tags') }}" placeholder="Laravel, Vue.js, MySQL" required>
                    <small style="color: #64748b;">Separate tags with commas</small>
                    @error('tags')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <div class="row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="demo_url">Demo URL</label>
                        <input type="url" id="demo_url" name="demo_url" class="form-control" value="{{ old('demo_url') }}" placeholder="https://demo.example.com">
                        @error('demo_url')<div class="error-message">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="github_url">GitHub URL</label>
                        <input type="url" id="github_url" name="github_url" class="form-control" value="{{ old('github_url') }}" placeholder="https://github.com/username/repo">
                        @error('github_url')<div class="error-message">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Project Image</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*">
                    <small style="color: #64748b;">Optional project screenshot (max 2MB)</small>
                    @error('image')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <div class="form-group" style="display: flex; gap: 2rem;">
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                        <span>Active (visible on website)</span>
                    </label>

                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                        <span>Featured Project</span>
                    </label>
                </div>

                <button type="submit" class="btn" style="width: 100%; margin-top: 1rem;">Add Project</button>
            </form>
        </div>
    </div>
@endsection
