@extends('layouts.main')

@section('content-box')
<link rel="stylesheet" href="/css/inputx.css">

    <div class="container mx-auto w-[70%]">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-3xl text-[#B6B6FF] text-center mt-24 font-bold">{{ __('Login Page') }}</div>

                    <div class="card-body mt-12">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-6 mt-12">
                                <div class="col-md-6 input-box">
                                    <input id="email" type="email"
                                        class="input form-control @error('email') is-invalid @enderror bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1 w-full peer translate-y-full pb-2"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label for="email"
                                        class="block peer-focus:-translate-y-full peer-focus:text-[#DEDEDE] transition ease-out">{{ __('Email Address') }}</label>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="my-6">
                                <div class="col-md-6 input-box">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror bg-transparent border-b-2 border-[#DEDEDE] text-white focus:outline-none placeholder:pl-1 w-full peer translate-y-full pb-2"
                                        name="password" required autocomplete="current-password">
                                    <label for="password"
                                        class="block peer-focus:-translate-y-full peer-focus:text-[#DEDEDE] transition ease-out">{{ __('Password') }}</label>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="my-6">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit"
                                        class="w-full mt-2 mb-4 bg-[#B6B6FF] text-slate-900 rounded-2xl py-2 hover:bg-[#9999d6] font-semibold text-xl">
                                        {{ __('Login') }}
                                    </button>

                                    <h4 class="text-[#747474]">
                                        Don't Have An Account?&nbsp;
                                        <a href="/register" class="underline hover:text-[#DEDEDE]">Register</a>
                                    </h4>

                                    {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link text-[#747474] hover:underline" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/inputx.js"></script>
@endsection
