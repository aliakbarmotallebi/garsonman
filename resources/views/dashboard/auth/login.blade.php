@extends('dashboard.auth.base') @section('content')
<main class="form-signin">
    @include('common.errors')
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal">ورود به حساب</h1>
        <div class="form-floating">
            <input type="text" class="form-control" id="name" name="phone_number" placeholder="Name">
            <label for="name">نام کاربری</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <label for="password">رمز عبور</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                مرا بخاطر بسپار
                <input type="checkbox" name="remember-me" value="remember-me"> 
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">ورود</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021–2022</p>
    </form>
</main>
@endsection