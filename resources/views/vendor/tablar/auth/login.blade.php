@extends('tablar::auth.layout')
@section('title', 'Login')
@section('content')
    <div class="container container-tight py-4">
        <div class="text-center mb-1 mt-5">
            <h2 class="display-6 text-primary fw-bolder">মেসার্স এস.এ রাইচ এজেন্সী</h2>
        </div>
        <div class="card card-md">
            <div class="card-body">
                <h2 class="h2 text-center mb-4">লগিন প্যানেল</h2>
                <form action="{{route('login')}}" method="post" autocomplete="off" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">ই-মেইল</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                               placeholder="your@email.com"
                               autocomplete="off">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            পাসওয়ার্ড
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Your password"
                                   autocomplete="off">
                            <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                           stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                           stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12"
                                                                                                              cy="12"
                                                                                                              r="2"/><path
                              d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/></svg>
                    </a>
                  </span>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input"/>
                            <span class="form-check-label">Remember me on this device</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">লগিন</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
