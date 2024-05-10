<x-guest-layout style="background-color:gray;">

<!-- Custom fonts for this template-->
<link href="{{asset('assets/vendor1/fontawesome-free/css1/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

    <form  method="POST" action="{{ route('register') }}">
        @csrf
        <table>
        <!-- Name -->
        <tr>
            
        <div class="form-group">

        <td>
            <x-input-label for="name" :value="__('Name')" /> 
        </td>
        <td>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        <td>
        </div>

        </tr>

        

        <tr>

         <!-- Username -->
         <div class="form-group">
         <td>
            <x-input-label for="username" :value="__('Username')" />
         </td>

         <td>
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </td>
        </div>

        </tr>


        <tr>
        <!-- Email Address -->
        <div class="mt-4">
            <td>
            <x-input-label for="email" :value="__('Email')" />
            </td>
            <td>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
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
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </td>
        </div>

        </tr>

        <tr>

        <!-- Confirm Password -->
        <div class="mt-4">
        <td>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        </td>

        <td>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </td>
        </div>

        <tr>

        </table>

        <br><br>

        <div class="text-center">

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>

            <br> <br>

            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-center" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

           

           
        </div>
    </form>


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
