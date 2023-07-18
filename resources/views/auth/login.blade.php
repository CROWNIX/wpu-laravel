@extends("layouts.main")

@section("container")
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="form-signin">
                <form action="/login" method="post">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center">Form Login</h1>
                    @if (session()->has("success"))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session("success") }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>         
                    @endif

                    @if (session()->has("error"))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session("error") }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>         
                    @endif
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" placeholder="Masukan Email" name="email" autofocus required value="{{ old("email") }}"/> 
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>       
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukan Password" name="password" required/> 
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>       
                        @enderror
                    </div>
                    <button class="btn btn-danger mb-2" style="width: 100%">Login</button>
                    <p>Dont have account ? <a href="/register" class="text-decoration-none">Register</a></p>
                </form>
            </main>
        </div>
    </div>
@endsection