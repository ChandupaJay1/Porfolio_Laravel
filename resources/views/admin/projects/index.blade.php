@extends('admin.layout')

@section('title', 'Projects')
@section('page-title', 'Projects')

@section('header-actions')
    <a href="{{ route('admin.projects.create') }}" class="btn">+ Add Project</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body" style="padding: 0;">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>Tags</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>
                            <strong>{{ $project->title }}</strong>
                            <br>
                            <small style="color: #64748b;">{{ Str::limit($project->description, 50) }}</small>
                        </td>
                        <td style="font-size: 2rem;">{{ $project->icon }}</td>
                        <td>
                            @php
                                $tagsArray = is_array($project->tags) ? $project->tags : explode(',', $project->tags);
                            @endphp
                            @foreach($tagsArray as $tag)
                                <span class="badge badge-info" style="margin: 2px;">{{ trim($tag) }}</span>
                            @endforeach
                        </td>
                        <td>
                                <span class="badge {{ $project->is_active ? 'badge-success' : 'badge-warning' }}">
                                    {{ $project->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            @if($project->is_featured)
                                <span class="badge badge-info">Featured</span>
                            @endif
                        </td>
                        <td>{{ $project->order }}</td>
                        <td style="white-space: nowrap;">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm" style="padding: 5px 10px; font-size: 0.85rem;">Edit</a>

                            <form action="{{ route('admin.projects.toggle-active', $project) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm" style="padding: 5px 10px; font-size: 0.85rem;">
                                    {{ $project->is_active ? 'Hide' : 'Show' }}
                                </button>
                            </form>

                            <form action="{{ route('admin.projects.toggle-featured', $project) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm" style="padding: 5px 10px; font-size: 0.85rem;">
                                    {{ $project->is_featured ? '★' : '☆' }}
                                </button>
                            </form>

                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="padding: 5px 10px; font-size: 0.85rem;" onclick="return confirm('Delete this project?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px; color: #64748b;">No projects yet</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-top: 20px;">
        {{ $projects->links() }}
    </div>
@endsection
