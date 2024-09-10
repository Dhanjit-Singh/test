<x-front-end.layout.app-layout>
    <div class="container">
        <div class="row">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="card-title">
                        <h4>User registration</h4>
                    </div>
                </div>
                <form action="{{ route('user.register-post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <span>Profile image</span>
                            <img src="" alt="" id="userRegSrc" style="height: 150px; width:150px;">
                            <input type="file" name="userRegImg" id="userRegInput">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text col-2">Name</span>
                            <input type="text" name="name" class="form-control" placeholder="Enter name.....">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text col-2">Email</span>
                            <input type="email" name="email" class="form-control" placeholder="Enter email.....">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text col-2">Password</span>
                            <input type="password" name="password" class="form-control" placeholder="Enter password.....">
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