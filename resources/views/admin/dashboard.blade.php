@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-info">
                <h3>{{ $stats['total_contacts'] }}</h3>
                <p>Total Contacts</p>
            </div>
            <div class="stat-icon contacts">
                ✉️
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h3>{{ $stats['unread_contacts'] }}</h3>
                <p>Unread Messages</p>
            </div>
            <div class="stat-icon unread">
                📬
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h3>{{ $stats['total_reviews'] }}</h3>
                <p>Total Reviews</p>
            </div>
            <div class="stat-icon reviews">
                ⭐
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h3>{{ $stats['pending_reviews'] }}</h3>
                <p>Pending Reviews</p>
            </div>
            <div class="stat-icon pending">
                ⏳
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h3>{{ $stats['total_projects'] }}</h3>
                <p>Total Projects</p>
            </div>
            <div class="stat-icon projects">
                💼
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h3>{{ $stats['active_projects'] }}</h3>
                <p>Active Projects</p>
            </div>
            <div class="stat-icon active">
                ✅
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(500px, 1fr)); gap: 20px; margin-top: 30px;">
        <!-- Recent Contacts -->
        <div class="card">
            <div class="card-header">
                <h2>Recent Contact Messages</h2>
                <a href="{{ route('admin.contacts.index') }}" class="btn">View All</a>
            </div>
            <div class="card-body">
                @if($recent_contacts->count() > 0)
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recent_contacts as $contact)
                            <tr style="cursor: pointer;" onclick="window.location='{{ route('admin.contacts.show', $contact) }}'">
                                <td><strong>{{ $contact->name }}</strong></td>
                                <td>{{ Str::limit($contact->subject, 30) }}</td>
                                <td>
                                    <span class="badge {{ $contact->is_read ? 'badge-success' : 'badge-warning' }}">
                                        {{ $contact->is_read ? 'Read' : 'Unread' }}
                                    </span>
                                </td>
                                <td style="color: #64748b;">{{ $contact->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <div class="empty-state-icon">📭</div>
                        <p>No contact messages yet</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Recent Reviews -->
        <div class="card">
            <div class="card-header">
                <h2>Recent Reviews</h2>
                <a href="{{ route('admin.reviews.index') }}" class="btn">View All</a>
            </div>
            <div class="card-body">
                @if($recent_reviews->count() > 0)
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recent_reviews as $review)
                            <tr>
                                <td><strong>{{ $review->name }}</strong></td>
                                <td>
                                    <span style="color: #fbbf24; font-size: 1.1rem;">
                                        {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge {{ $review->is_approved ? 'badge-success' : 'badge-warning' }}">
                                        {{ $review->is_approved ? 'Approved' : 'Pending' }}
                                    </span>
                                    @if($review->is_featured)
                                        <span class="badge badge-info">Featured</span>
                                    @endif
                                </td>
                                <td style="color: #64748b;">{{ $review->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <div class="empty-state-icon">⭐</div>
                        <p>No reviews yet</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Projects -->
    <div class="card" style="margin-top: 30px;">
        <div class="card-header">
            <h2>Recent Projects</h2>
            <div style="display: flex; gap: 10px;">
                <a href="{{ route('admin.projects.create') }}" class="btn">➕ Add New</a>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">View All</a>
            </div>
        </div>
        <div class="card-body">
            @if($recent_projects->count() > 0)
                <table>
                    <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recent_projects as $project)
                        <tr style="cursor: pointer;" onclick="window.location='{{ route('admin.projects.edit', $project) }}'">
                            <td style="font-size: 1.5rem;">{{ $project->icon }}</td>
                            <td>
                                <strong>{{ $project->title }}</strong>
                                <br>
                                <small style="color: #64748b;">{{ Str::limit($project->description, 50) }}</small>
                            </td>
                            <td>
                                <div style="display: flex; gap: 5px; flex-wrap: wrap;">
                                    @php
                                        $tagsArray = is_array($project->tags) ? $project->tags : explode(',', $project->tags);
                                        $displayTags = array_slice($tagsArray, 0, 3);
                                    @endphp
                                    @foreach($displayTags as $tag)
                                        <span class="badge badge-info" style="font-size: 0.75rem;">{{ trim($tag) }}</span>
                                    @endforeach
                                    @if(count($tagsArray) > 3)
                                        <span class="badge" style="background: #94a3b8; font-size: 0.75rem;">+{{ count($tagsArray) - 3 }}</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <span class="badge {{ $project->is_active ? 'badge-success' : 'badge-secondary' }}">
                                    {{ $project->is_active ? 'Active' : 'Hidden' }}
                                </span>
                                @if($project->is_featured)
                                    <span class="badge" style="background: #f59e0b; color: white;">⭐ Featured</span>
                                @endif
                            </td>
                            <td style="color: #64748b;">{{ $project->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">💼</div>
                    <p>No projects yet</p>
                    <a href="{{ route('admin.projects.create') }}" class="btn" style="margin-top: 15px;">➕ Add Your First Project</a>
                </div>
            @endif
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card" style="margin-top: 30px;">
        <div class="card-header">
            <h2>Quick Actions</h2>
        </div>
        <div class="card-body" style="padding: 25px;">
            <div class="quick-actions">
                <a href="{{ route('admin.projects.create') }}" class="btn">
                    💼 Add New Project
                </a>
                <a href="{{ route('admin.reviews.create') }}" class="btn">
                    ➕ Add New Review
                </a>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                    📧 View All Messages
                </a>
                <a href="{{ route('home') }}" class="btn btn-secondary" target="_blank">
                    🌐 Visit Website
                </a>
            </div>
        </div>
    </div>

    <!-- Summary Info -->
    <div style="margin-top: 30px; padding: 25px; background: white; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        <h3 style="margin-bottom: 15px; color: #1e293b;">📊 Summary</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
            <div>
                <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 5px;">Approved Reviews</p>
                <p style="font-size: 1.5rem; font-weight: 700; color: #059669;">{{ $stats['approved_reviews'] }}</p>
            </div>
            <div>
                <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 5px;">Pending Approval</p>
                <p style="font-size: 1.5rem; font-weight: 700; color: #f59e0b;">{{ $stats['pending_reviews'] }}</p>
            </div>
            <div>
                <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 5px;">Unread Messages</p>
                <p style="font-size: 1.5rem; font-weight: 700; color: #ec4899;">{{ $stats['unread_contacts'] }}</p>
            </div>
            <div>
                <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 5px;">Featured Projects</p>
                <p style="font-size: 1.5rem; font-weight: 700; color: #3b82f6;">{{ $stats['featured_projects'] }}</p>
            </div>
        </div>
    </div>
@endsection
