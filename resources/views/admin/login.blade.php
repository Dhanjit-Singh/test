<x-front-end.layout.app-layout>
    <div class="container">
        <div class="row">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Admin login</h4>
                    </div>
                </div>
                <form action="{{ route('admin.login-post') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text col-2">Email</span>
                            <input type="email" name="email" class="form-control" placeholder="Enter email.....">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text col-2">Password</span>
                            <input type="password" name="password" class="form-control" placeholder="Enter password.....">
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="/" class="btn btn-secondary">Home</a>
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-front-end.layout.app-layout>