@extends('layouts.main')

@section('content-box')
<link rel="stylesheet" href="/css/inputx.css">

    <div class="container mx-auto w-[70%]">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-3xl text-[#B6B6FF] text-center mt-24 font-bold">{{ __('Register Page') }}
                    </div>

                    <div class="card-body mt-6">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-6">
                                <div class="col-md-6 input-box">
                                    <input id="name" type="text" value="{{ old('name') }}"
                                        class="input form-control @error('email') is-invalid @enderror bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1 w-full peer translate-y-full pb-2"
                                        name="name" required autocomplete="name" autofocus>
                                    <label for="name"
                                        class="block peer-focus:-translate-y-full peer-focus:text-[#DEDEDE] transition ease-out">{{ __('Name') }}</label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-6">
                                <div class="col-md-6 input-box">
                                    <input id="email" type="email"
                                        class="input form-control @error('email') is-invalid @enderror bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1 w-full peer translate-y-full pb-2"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <label for="email"
                                        class="block peer-focus:-translate-y-full peer-focus:text-[#DEDEDE] transition ease-out">{{ __('Email Address') }}</label>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-6">
                                <div class="col-md-6 input-box">
                                    <input id="number" type="text"
                                        class="input form-control @error('email') is-invalid @enderror bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1 w-full peer translate-y-full pb-2"
                                        name="number" value="{{ old('number') }}" required autocomplete="number">
                                    <label for="number"
                                        class="block peer-focus:-translate-y-full peer-focus:text-[#DEDEDE] transition ease-out">{{ __('Phone Number') }}</label>

                                    @error('number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-6">

                                <div class="col-md-6 input-box">
                                    <input id="password" type="password"
                                        class="input form-control @error('email') is-invalid @enderror bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1 w-full peer translate-y-full pb-2"
                                        name="password" required autocomplete="new-password">
                                    <label for="password"
                                        class="block peer-focus:-translate-y-full peer-focus:text-[#DEDEDE] transition ease-out">{{ __('Password') }}</label>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-12">
                                <div class="col-md-6 input-box">
                                    <input id="password-confirm" type="password"
                                        class="input form-control @error('email') is-invalid @enderror bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1 w-full peer translate-y-full pb-2"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <label for="password-confirm"
                                        class="block peer-focus:-translate-y-full peer-focus:text-[#DEDEDE] transition ease-out">{{ __('Confirm Password') }}</label>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit"
                                        class="w-full mt-2 mb-4 bg-[#B6B6FF] text-slate-900 rounded-2xl py-2 hover:bg-[#9999d6] font-semibold text-xl">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                            <h4 class="text-[#747474]">
                                Already Have An Account?&nbsp;
                                <a href="/login" class="underline hover:text-[#DEDEDE]">Login</a>
                            </h4>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/inputx.js"></script>
@endsection
