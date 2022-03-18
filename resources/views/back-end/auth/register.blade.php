<!DOCTYPE html>
<html>

<head>
    <title>Sign up Form</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/back-end/loginStyle.css')}}">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-gray-300" style="font-family:Roboto">
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
            <h3 class="text-2xl font-bold text-center">Join us</h3>
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="mt-4">
                    <div>
                        <label class="block" for="Name">Name<label>
                        <span class="text-red-400">(*)</span>
                                <input type="text" placeholder="Name" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 
                                " value="{{old('name')}}" id="name" name="name">
                                @error('name')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{$message}}
                                </div>
                                @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block" for="username">Username<label>
                        <span class="text-red-400">(*)</span>
                                <input type="text" placeholder="Username" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 
                                 " value="{{old('username')}}" id="username" name="username"> 
                                @error('username')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{$message}}
                                </div>
                                @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block" for="password">Password<label>
                        <span class="text-red-400">(*)</span>
                                <input type="password" placeholder="Password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 "
                                id="password" name="password">
                                @error('password')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{$message}}
                                </div>
                                @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block" for="password_confirmation">Confirm Password<label>
                        <span class="text-red-400">(*)</span>
                                <input type="password" placeholder="Repeat Password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                id="password_confirmation" name="password_confirmation">
                                @error('password')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{$message}}
                                </div>
                                @enderror
                    </div>
                    <div class="flex">
                        <button class="w-full px-6 py-2 mt-4 text-white bg-green-600 rounded-lg hover:bg-green-900">
                            Create Account</button>
                    </div>
                    <div class="mt-6 text-grey-dark">
                        Already have an account?
                        <a class="text-blue-600 hover:underline" href="{{route('login')}}">
                            Log in
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>