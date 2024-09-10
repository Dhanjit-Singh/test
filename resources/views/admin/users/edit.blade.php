<x-front-end.layout.app-layout>
    <div class="container">
        <div class="row">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="card-title">
                        <h4>User details</h4>
                    </div>
                </div>
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <span>Profile image</span>
                            <img src="{{ $user->image ?: asset('Image/dummy-avatar.jpg') }}" alt="" id="userRegSrcUp" style="height: 150px; width:150px;">
                            <input type="file" name="userRegImgUp" id="userRegInputUp">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text col-2">Name</span>
                            <input type="text" name="name" value="{{ $user->name ?? '' }}" class="form-control" placeholder="Enter name.....">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text col-2">Email</span>
                            <input type="email" name="email" value="{{ $user->email ?? '' }}" class="form-control" placeholder="Enter email.....">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text col-2">Password</span>
                            <input type="password" name="password" value="{{ $user->decrypt_password ?? '' }}" class="form-control" placeholder="Enter password.....">
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="/" class="btn btn-secondary">Back</a>
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-front-end.layout.app-layout>