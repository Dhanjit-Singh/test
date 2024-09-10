<x-front-end.layout.app-layout>
    <div class="container">
        <div class="row">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Users list</h4>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">+ Add</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Decrypted password</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name ?? '' }}</td>
                                <td>{{ $user->email ?? '' }}</td>
                                <td>{{ $user->decrypt_password ?? '' }}</td>
                                <td>
                                    <img src="{{ $user->image ?: asset('Image/dummy-avatar.jpg') }}" alt="" style="height:80px; width:100px;">
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-secondary">View</a>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>S.no</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Decrypted password</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-front-end.layout.app-layout>