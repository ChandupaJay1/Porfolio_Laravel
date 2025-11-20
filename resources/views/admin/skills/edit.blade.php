@extends('admin.layout')

@section('title', 'Edit Skill')
@section('page-title', 'Edit Skill')

@section('header-actions')
    <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">← Back</a>
@endsection

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <div class="card-body" style="padding: 2rem;">
            <form action="{{ route('admin.skills.update', $skill) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="category">Category *</label>
                    <input type="text" id="category" name="category" class="form-control" value="{{ old('category', $skill->category) }}" required>
                    @error('category')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="name">Skill Name *</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $skill->name) }}" required>
                    @error('name')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="percentage">Skill Level (%) *</label>
                    <input type="range" id="percentage" name="percentage" class="form-range" min="0" max="100" value="{{ old('percentage', $skill->percentage) }}" style="width: 100%;" oninput="this.nextElementSibling.textContent = this.value + '%'">
                    <div style="text-align: center; font-size: 1.5rem; font-weight: 700; color: var(--primary); margin-top: 0.5rem;">
                        {{ old('percentage', $skill->percentage) }}%
                    </div>
                    @error('percentage')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="order">Display Order</label>
                    <input type="number" id="order" name="order" class="form-control" value="{{ old('order', $skill->order) }}">
                    @error('order')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $skill->is_active) ? 'checked' : '' }}>
                        <span>Active (visible on website)</span>
                    </label>
                </div>

                <button type="submit" class="btn" style="width: 100%; margin-top: 1rem;">Update Skill</button>
            </form>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .form-range {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 8px;
            border-radius: 5px;
            background: linear-gradient(to right, #6366f1 0%, #6366f1 {{ old('percentage', $skill->percentage) }}%, #e2e8f0 {{ old('percentage', $skill->percentage) }}%, #e2e8f0 100%);
            outline: none;
        }

        .form-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #6366f1;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(99, 102, 241, 0.4);
        }

        .form-range::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #6366f1;
            cursor: pointer;
            border: none;
            box-shadow: 0 2px 8px rgba(99, 102, 241, 0.4);
        }
    </style>
@endsection
