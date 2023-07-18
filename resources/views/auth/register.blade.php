@extends("layouts.main")

@section("container")
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="form-signin">
                <form action="/register" method="post">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" placeholder="Masukan Nama" name="name" value="{{ old("name") }}" required/>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>       
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error("username") is-invalid @enderror" id="username" placeholder="Masukan Username" name="username" value="{{ old("username") }}" required/>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>       
                        @enderror 
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" placeholder="Masukan Email" name="email" value="{{ old("email") }}" required/>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>       
                        @enderror 
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error("password") is-invalid @enderror" id="password" placeholder="Masukan Password" name="password" required/>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>       
                        @enderror 
                    </div>
                    <button class="btn btn-danger mb-2" style="width: 100%">Register</button>
                    <p>Alredy registered ? <a href="/login" class="text-decoration-none">Login</a></p>
                </form>
            </main>
        </div>
    </div>
@endsection