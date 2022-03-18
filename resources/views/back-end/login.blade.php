<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/back-end/loginStyle.css')}}">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-gray-300" style="font-family:Roboto">
    <div class="w-full h-screen flex items-center justify-center">
    @if(session('status'))
            {{session('status')}}
        @endif
        <form class="w-full md:w-1/3 bg-white rounded-lg" action="{{route('login')}}" method="post">
            @csrf
            <div class="flex font-bold justify-center mt-6">
                <img class="h-20 w-20" src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/avatar.svg">
            </div>
            <h2 class="text-3xl text-center text-gray-700 mb-4" >Login Form</h2>
            <div class="px-12 pb-10">
                <div class="w-full mb-2">
                    <div class="flex items-center">
                        <i class='ml-3 fill-current text-gray-400 text-xs z-10 fas fa-user'></i>
                        <input id="username" name="username" type='text' placeholder="Username" class="-mx-6 px-8  w-full border rounded px-3 py-2 text-gray-700 focus:outline-none  @error('username') border-red-500 @enderror" />
                    </div>
                    @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="w-full mb-2">
                    <div class="flex items-center">
                        <i class='ml-3 fill-current text-gray-400 text-xs z-10 fas fa-lock'></i>
                        <input id="password" name="password" type='password' placeholder="Password" class="-mx-6 px-8 w-full border rounded px-3 py-2 text-gray-700 focus:outline-none  @error('password') border-red-500 @enderror" />
                    </div>
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <div class="flec items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <button type="submit" class="w-full py-2 rounded-full bg-green-600 text-gray-100  focus:outline-none">
                    Log in</button>
        </form>
    </div>
</body>

</html>