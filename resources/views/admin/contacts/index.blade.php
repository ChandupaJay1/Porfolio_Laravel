@extends('admin.layout')

@section('title', 'Contact Messages')
@section('page-title', 'Contact Messages')

@section('content')
    <div class="card">
        <div class="card-body" style="padding: 0;">
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
                                <span class="badge {{ $contact->is_read ? 'badge-success' : 'badge-warning' }}">
                                    {{ $contact->is_read ? 'Read' : 'Unread' }}
                                </span>
                        </td>
                        <td>{{ $contact->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="btn" style="padding: 5px 15px; font-size: 0.9rem;">View</a>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 5px 15px; font-size: 0.9rem;" onclick="return confirm('Delete this message?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px; color: #64748b;">No contact messages yet</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-top: 20px;">
        {{ $contacts->links() }}
    </div>
@endsection
