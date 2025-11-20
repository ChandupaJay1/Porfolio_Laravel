@extends('admin.layout')

@section('title', 'Edit Project')
@section('page-title', 'Edit Project')

@section('header-actions')
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">← Back</a>
@endsection

@section('content')
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <div class="card-body" style="padding: 2rem;">
            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Project Title *</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
                    @error('title')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description', $project->description) }}</textarea>
                    @error('description')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <div class="row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="icon">Icon/Emoji *</label>
                        <input type="text" id="icon" name="icon" class="form-control" value="{{ old('icon', $project->icon) }}" required>
                        @error('icon')<div class="error-message">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="order">Display Order</label>
                        <input type="number" id="order" name="order" class="form-control" value="{{ old('order', $project->order) }}">
                        @error('order')<div class="error-message">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="tags">Tags * (comma separated)</label>
                    <input type="text" id="tags" name="tags" class="form-control" value="{{ old('tags', $project->tags) }}" placeholder="Laravel, Vue.js, MySQL" required>
                    <small style="color: #64748b;">Separate tags with commas</small>
                    @error('tags')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <div class="row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="demo_url">Demo URL</label>
                        <input type="url" id="demo_url" name="demo_url" class="form-control" value="{{ old('demo_url', $project->demo_url) }}">
                        @error('demo_url')<div class="error-message">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="github_url">GitHub URL</label>
                        <input type="url" id="github_url" name="github_url" class="form-control" value="{{ old('github_url', $project->github_url) }}">
                        @error('github_url')<div class="error-message">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Project Image</label>
                    @if($project->image)
                        <div style="margin-bottom: 0.5rem;">
                            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" style="max-width: 200px; border-radius: 8px;">
                        </div>
                    @endif
                    <input type="file" id="image" name="image" class="form-control" accept="image/*">
                    <small style="color: #64748b;">Leave empty to keep current image</small>
                    @error('image')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <div class="form-group" style="display: flex; gap: 2rem;">
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $project->is_active) ? 'checked' : '' }}>
                        <span>Active (visible on website)</span>
                    </label>

                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
                        <span>Featured Project</span>
                    </label>
                </div>

                <button type="submit" class="btn" style="width: 100%; margin-top: 1rem;">Update Project</button>
            </form>
        </div>
    </div>
@endsection
