<!DOCTYPE html>
<html lang="en" data-theme="light"º>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Iniciar session</title>
</head>

<body class="h-screen">
    <div class="h-full w-full  flex justify-center items-center bg-base-300">
        <section class='w-4/5 md:w-2/5 card  bg-base-100 shadow-xl'>
            <div class='card-body'>
                <header class='mb-4'>
                    <h1 class='text-2xl text-center font-bold uppercase'>
                        Iniciar sesión
                    </h1>
                </header>
                <form method="POST" action="{{ route('auth.login') }}">
                    @csrf

                    <label class="input input-bordered flex items-center gap-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="h-4 w-4 opacity-70">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                        </svg>
                        <input type="text" name="email" class="grow" placeholder="Email" value="{{old('email')}}" />
                    </label>

                    @error('email')
                        <p  class="text-red-500 font-bold my-2"> {{ $message }} </p>
                    @enderror

                    <label class="input input-bordered flex items-center gap-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="h-4 w-4 opacity-70">
                            <path fillRule="evenodd"
                                d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                clipRule="evenodd" />
                        </svg>
                        <input type="password" name="password" class="grow" placeholder="Contraseña" />
                    </label>

                    @error('password')
                        <p class="text-red-500 font-bold mx-2"> {{ $message }} </p>
                    @enderror

                    <button class='btn btn-primary w-full' type='submit'>
                        Ingresar
                    </button>
                </form>
            </div>
        </section>
    </div>
</body>

</html>
