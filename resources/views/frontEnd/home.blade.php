<x-front-end.layout.app-layout>
    <div class="container">
        <div class="row">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Welcome <span style="color: rgb(185, 51, 28);">{{ ucfirst($user->name ?? '') }}</span></h4>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('user.logout') }}" class="btn btn-danger">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img src="{{ $user->image ?: asset('Image/dummy-avatar.jpg')}}" alt="" style="width:150px; height:150px;">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-2">Name</span>
                        <input type="text" class="form-control" value="{{ $user->name ?? '' }}" disabled>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-2">Email</span>
                        <input type="text" class="form-control" value="{{ $user->email ?? '' }}" disabled>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-2">Password</span>
                        <input type="text" class="form-control" value="{{ $user->decrypt_password }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front-end.layout.app-layout>