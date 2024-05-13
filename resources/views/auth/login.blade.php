<x-guest-layout>

    <!-- Custom fonts for this template-->
<link href="{{asset('assets/vendor1/fontawesome-free/css1/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
  
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css1/sb-admin-2.min.css')}}" rel="stylesheet">

                <body class="bg-gradient-primary" >
                    <div class="a" style="background-color:gray;">

                        <div class="container" >

                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                        <div class="col-lg-5 d-none d-lg-block" style="background-image:url('assets/images/library.png');" ></div>
                                            <div class="col-lg-7">
                                                <div class="p-5">
                                                    <div class="text-center">
                                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                                    </div>

                                                    <form method="POST" action="{{ route('login') }}">
                                                        @csrf
                                             <table>
                                                <tr>
                                                        

                                                        <!-- Email Address -->
                                                        <div>
                                                            <td>
                                                            <x-input-label for="email" :value="__('Email')" />
                                                            </td>
                                                            <td>
                                                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                            </td>
                                                            
                                                        </div>
                                                </tr>

                                                <tr>
                                                    <!-- Password -->
                                                    <div class="mt-4">
                                                        <td>
                                                        <x-input-label for="password" :value="__('Password')" />
                                                        </td>
                                                           
                                                        <td>
                                                        <x-text-input id="password" class="block mt-1 w-full"
                                                                            type="password"
                                                                            name="password"
                                                                            required autocomplete="current-password" />

                                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                                        </td>
                                                            
                                                        </div>


                                                </tr>

                                                </table>

                                                        
                                                        <!-- Remember Me -->
                                                        <div class="block mt-4">
                                                            <label for="remember_me" class="inline-flex items-center">
                                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                            </label>
                                                        </div>

                                                        <div class="flex items-center justify-end mt-4">
                                                            @if (Route::has('password.request'))
                                                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                                    {{ __('Forgot your password?') }}
                                                                </a>
                                                            @endif

                                                            <x-primary-button class="ms-3">
                                                                {{ __('Log in') }}
                                                            </x-primary-button>
                                                        </div>
                                                    </form>

                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </body>
                <!-- Bootstrap core JavaScript-->
     <script src="{{asset('assets/vendor1/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor1/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/vendor1/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/js1/sb-admin-2.min.js')}}"></script>
</x-guest-layout>
