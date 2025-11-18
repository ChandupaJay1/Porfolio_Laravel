@extends('admin.layout')

@section('title', 'Review Details')
@section('page-title', 'Review Details')

@section('header-actions')
    <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">← Back to Reviews</a>
    <a href="{{ route('admin.reviews.edit', $review) }}" class="btn">Edit Review</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <!-- Review Content -->
            <div class="card">
                <div class="card-body" style="padding: 2rem;">
                    <!-- Rating -->
                    <div style="margin-bottom: 2rem;">
                        <h5 style="color: #64748b; margin-bottom: 0.75rem; font-weight: 600;">Rating</h5>
                        <div style="font-size: 2.5rem; color: #fbbf24; letter-spacing: 0.2rem;">
                            {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
                        </div>
                        <p style="color: #64748b; margin-top: 0.5rem; font-size: 0.95rem;">
                            {{ $review->rating }} out of 5 stars
                        </p>
                    </div>

                    <!-- Review Text -->
                    <div style="margin-bottom: 2rem;">
                        <h5 style="color: #64748b; margin-bottom: 0.75rem; font-weight: 600;">Review</h5>
                        <div style="background: #f8fafc; padding: 1.5rem; border-radius: 10px; border-left: 4px solid #6366f1; position: relative;">
                            <div style="position: absolute; top: 10px; left: 15px; font-size: 3rem; color: #6366f1; opacity: 0.2; line-height: 1;">"</div>
                            <p style="font-size: 1.1rem; line-height: 1.8; margin: 0; color: #1e293b; padding-left: 2rem; font-style: italic;">
                                {{ $review->review }}
                            </p>
                        </div>
                    </div>

                    <!-- Reviewer Information -->
                    <div style="margin-bottom: 2rem;">
                        <h5 style="color: #64748b; margin-bottom: 0.75rem; font-weight: 600;">Reviewer Information</h5>
                        <div style="background: white; border: 2px solid #e2e8f0; padding: 1.5rem; border-radius: 10px;">
                            <div style="display: flex; align-items: center; gap: 1.5rem;">
                                <div style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, #6366f1, #8b5cf6); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.8rem; font-weight: bold; flex-shrink: 0;">
                                    {{ $review->initials }}
                                </div>
                                <div style="flex: 1;">
                                    <h4 style="margin: 0 0 0.5rem 0; color: #1e293b; font-size: 1.3rem;">{{ $review->name }}</h4>
                                    @if($review->position || $review->company)
                                        <p style="margin: 0; color: #64748b; font-size: 1rem;">
                                            @if($review->position)
                                                <span style="font-weight: 500;">{{ $review->position }}</span>
                                            @endif
                                            @if($review->position && $review->company)
                                                <span style="color: #94a3b8;"> at </span>
                                            @endif
                                            @if($review->company)
                                                <span style="font-weight: 500;">{{ $review->company }}</span>
                                            @endif
                                        </p>
                                    @else
                                        <p style="margin: 0; color: #94a3b8; font-size: 0.9rem; font-style: italic;">No company information provided</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dates -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; padding: 1.5rem; background: #f8fafc; border-radius: 10px;">
                        <div>
                            <h6 style="color: #64748b; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem;">Submitted</h6>
                            <p style="margin: 0; color: #1e293b; font-weight: 500;">{{ $review->created_at->format('F d, Y') }}</p>
                            <small style="color: #64748b;">{{ $review->created_at->diffForHumans() }}</small>
                        </div>
                        <div>
                            <h6 style="color: #64748b; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem;">Last Updated</h6>
                            <p style="margin: 0; color: #1e293b; font-weight: 500;">{{ $review->updated_at->format('F d, Y') }}</p>
                            <small style="color: #64748b;">{{ $review->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Status Card -->
            <div class="card" style="margin-bottom: 1.5rem;">
                <div class="card-body">
                    <h5 style="margin-bottom: 1.2rem; font-weight: 600; margin-left: 0.5rem;">Status & Actions</h5>

                    <!-- Approval Status -->
                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; margin-bottom: 0.5rem; color: #64748b; font-weight: 600; font-size: 0.9rem; margin-left: 0.5rem;">Approval Status</label>
                        <span class="badge {{ $review->is_approved ? 'badge-success' : 'badge-warning' }}" style="font-size: 0.95rem; padding: 0.5rem 1rem;margin-left: 0.5rem;">
                            {{ $review->is_approved ? '✓ Approved' : '⏳ Pending Approval' }}
                        </span>
                    </div>

                    <!-- Featured Status -->
                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; margin-bottom: 0.5rem; color: #64748b; font-weight: 600; font-size: 0.9rem; margin-left: 0.5rem;">Featured Status</label>
                        <span class="badge {{ $review->is_featured ? 'badge-info' : '' }}" style="font-size: 0.95rem; padding: 0.5rem 1rem; background: {{ $review->is_featured ? '#dbeafe' : '#f1f5f9' }}; color: {{ $review->is_featured ? '#1e40af' : '#64748b' }}; margin-left: 0.5rem;">
                            {{ $review->is_featured ? '⭐ Featured' : 'Not Featured' }}
                        </span>
                    </div>

                    <hr style="margin: 1.5rem 0;">

                    <!-- Actions -->
                    <div style="display: flex; flex-direction: column; gap: 0.95rem;">
                        <form action="{{ route('admin.reviews.toggle-approval', $review) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn {{ $review->is_approved ? 'btn-secondary' : '' }}" style="width: 95%; margin-left: 1rem; {{ !$review->is_approved ? 'background: linear-gradient(135deg, #6366f1, #8b5cf6);' : '' }}">
                                {{ $review->is_approved ? '✗ Unapprove' : '✓ Approve' }}
                            </button>
                        </form>

                        <form action="{{ route('admin.reviews.toggle-featured', $review) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn {{ $review->is_featured ? 'btn-secondary' : '' }}" style="width: 95%; margin-left: 1rem; {{ !$review->is_featured ? 'background: linear-gradient(135deg, #6366f1, #8b5cf6);' : '' }}">
                                {{ $review->is_featured ? '✗ Unfeature' : '⭐ Feature' }}
                            </button>
                        </form>

                        <hr style="margin: 0.5rem 0;">

                        <a href="{{ route('admin.reviews.edit', $review) }}" class="btn btn-secondary" style="width: 95%; margin-left: 1rem;">
                            ✏️ Edit Review
                        </a>

                        <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="width: 95%; margin-left: 1rem;">
                                🗑️ Delete Review
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Preview Card -->
            <div class="card">
                <div class="card-body">
                    <h5 style="margin-bottom: 1rem; font-weight: 600; margin-left: 1rem;">Frontend Preview</h5>
                    <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 1rem; margin-left: 1rem;">This is how the review appears on your website:</p>

                    <div style="background: #f8fafc; padding: 1.5rem; border-radius: 10px; border: 2px solid #e2e8f0; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                        <div style="font-size: 2.5rem; color: #6366f1; opacity: 0.2; line-height: 1; margin-bottom: 0.5rem;">"</div>
                        <p style="font-style: italic; margin-bottom: 1rem; color: #334155; font-size: 0.95rem; line-height: 1.6;">
                            {{ Str::limit($review->review, 120) }}
                        </p>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <div style="width: 45px; height: 45px; border-radius: 50%; background: linear-gradient(135deg, #6366f1, #8b5cf6); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 1rem; flex-shrink: 0;">
                                {{ $review->initials }}
                            </div>
                            <div style="flex: 1; min-width: 0;">
                                <strong style="font-size: 0.95rem; display: block; color: #1e293b;">{{ $review->name }}</strong>
                                <div style="color: #fbbf24; font-size: 0.85rem; margin-top: 0.25rem;">
                                    {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
