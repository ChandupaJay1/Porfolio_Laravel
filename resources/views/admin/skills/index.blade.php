@extends('admin.layout')

@section('title', 'Skills')
@section('page-title', 'Skills')

@section('header-actions')
    <a href="{{ route('admin.skills.create') }}" class="btn">+ Add Skill</a>
@endsection

@section('content')
    <!-- Grouped Skills Preview -->
    <div class="card" style="margin-bottom: 2rem;">
        <div class="card-body" style="padding: 2rem;">
            <h3 style="margin-bottom: 1.5rem; color: var(--dark);">Frontend Preview</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                @foreach($groupedSkills as $category => $categorySkills)
                    <div style="background: var(--light); padding: 1.5rem; border-radius: 12px; border: 1px solid var(--border);">
                        <h4 style="color: var(--primary); margin-bottom: 1rem;">{{ $category }}</h4>
                        @foreach($categorySkills as $skill)
                            <div style="margin-bottom: 1rem;">
                                <p style="margin-bottom: 0.5rem; font-weight: 500; color: var(--text);">{{ $skill->name }}</p>
                                <div style="background: #e2e8f0; height: 6px; border-radius: 3px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--primary), var(--secondary)); height: 100%; width: {{ $skill->percentage }}%; border-radius: 3px;"></div>
                                </div>
                                <small style="color: #64748b;">{{ $skill->percentage }}%</small>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- All Skills Table -->
    <div class="card">
        <div class="card-body" style="padding: 0;">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Skill Name</th>
                    <th>Percentage</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($skills as $skill)
                    <tr>
                        <td>{{ $skill->id }}</td>
                        <td><strong>{{ $skill->category }}</strong></td>
                        <td>{{ $skill->name }}</td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                <div style="flex: 1; background: #e2e8f0; height: 8px; border-radius: 4px; overflow: hidden; max-width: 200px;">
                                    <div style="background: linear-gradient(90deg, var(--primary), var(--secondary)); height: 100%; width: {{ $skill->percentage }}%;"></div>
                                </div>
                                <span style="font-weight: 600;">{{ $skill->percentage }}%</span>
                            </div>
                        </td>
                        <td>{{ $skill->order }}</td>
                        <td>
                                <span class="badge {{ $skill->is_active ? 'badge-success' : 'badge-warning' }}">
                                    {{ $skill->is_active ? 'Active' : 'Inactive' }}
                                </span>
                        </td>
                        <td style="white-space: nowrap;">
                            <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-sm" style="padding: 5px 10px; font-size: 0.85rem;">Edit</a>

                            <form action="{{ route('admin.skills.toggle-active', $skill) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm" style="padding: 5px 10px; font-size: 0.85rem;">
                                    {{ $skill->is_active ? 'Hide' : 'Show' }}
                                </button>
                            </form>

                            <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="padding: 5px 10px; font-size: 0.85rem;" onclick="return confirm('Delete this skill?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px; color: #64748b;">No skills yet</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-top: 20px;">
        {{ $skills->links() }}
    </div>
@endsection
