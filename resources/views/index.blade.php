<x-front-end.layout.app-layout>
    <h1>Welcome to index page!</h1>
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <a href="{{ route('user.register') }}">User register</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <a href="{{ route('user.login') }}">User login</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <a href="{{ route('admin.register') }}">Admin register</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <a href="{{ route('admin.login') }}">Admin login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front-end.layout.app-layout>