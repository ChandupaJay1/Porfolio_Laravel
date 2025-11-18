@extends('admin.layout')

@section('title', 'Reviews')
@section('page-title', 'Reviews')

@section('header-actions')
    <a href="{{ route('admin.reviews.create') }}" class="btn">+ Add Review</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body" style="padding: 0;">
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
                        <td><span style="color: #fbbf24;">{{ $review->stars }}</span></td>
                        <td>
                                <span class="badge {{ $review->is_approved ? 'badge-success' : 'badge-warning' }}">
                                    {{ $review->is_approved ? 'Approved' : 'Pending' }}
                                </span>
                            @if($review->is_featured)
                                <span class="badge badge-info">Featured</span>
                            @endif
                        </td>
                        <td>{{ $review->created_at->format('M d, Y') }}</td>
                        <td style="white-space: nowrap;">
                            <a href="{{ route('admin.reviews.show', $review) }}" class="btn btn-sm" style="padding: 5px 10px; font-size: 0.85rem; background: #3b82f6; color: white;">View</a>
                            <form action="{{ route('admin.reviews.toggle-approval', $review) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn" style="padding: 5px 10px; font-size: 0.85rem;">
                                    {{ $review->is_approved ? 'Unapprove' : 'Approve' }}
                                </button>
                            </form>
                            <form action="{{ route('admin.reviews.toggle-featured', $review) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-secondary" style="padding: 5px 10px; font-size: 0.85rem;">
                                    {{ $review->is_featured ? 'Unfeature' : 'Feature' }}
                                </button>
                            </form>
                            <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 5px 10px; font-size: 0.85rem;" onclick="return confirm('Delete this review?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px; color: #64748b;">No reviews yet</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-top: 20px;">
        {{ $reviews->links() }}
    </div>
@endsection
