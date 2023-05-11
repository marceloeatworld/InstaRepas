<x-app-layout>
<h1>Users</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Is Admin</th>
            <th>Points</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        @if($user->id == 1)
                @continue
            @endif
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>
                <form action="{{ route('admin.users.toggleAdmin', $user) }}" method="post">
    @csrf
    @method('PUT')
                        <input type="hidden" name="is_admin" value="{{ $user->is_admin ? 0 : 1 }}">
                        <button type="submit" class="btn btn-link">{{ $user->is_admin ? 'Yes' : 'No' }}</button>
                    </form>
                </td>
                <td>
                <form action="{{ route('admin.users.updatePoints', $user) }}" method="post">
    @csrf
    @method('PUT')
                        <input type="number" name="points" value="{{ $user->points }}" class="form-control">
                        <button type="submit" class="btn btn-primary mt-2">Update Points</button>
                    </form>
                </td>
                <td>
                <form action="{{ route('admin.users.destroy', $user) }}" method="post">
    @csrf
    @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<x-app-layout>