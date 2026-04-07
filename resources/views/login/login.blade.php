<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="relative">

<!-- BACKGROUND -->
<div class="absolute inset-0">
    <img src="{{ asset('img/image1.png') }}" 
         class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-blue-900/80"></div>
</div>

<!-- LOGIN BOX -->
<div class="relative z-10 min-h-screen flex items-center justify-center">

    <div class="backdrop-blur-md bg-white/10 border border-white/30 rounded-2xl p-8 w-[400px] text-white shadow-xl">

        <h2 class="text-3xl font-bold text-center mb-2">Login</h2>
        <p class="text-center text-sm text-gray-200 mb-6">
            Please enter your Login and your Password
        </p>

        <form method="POST" action="#">
            @csrf

            <!-- EMAIL -->
            <div class="mb-4">
                <div class="flex items-center bg-white/10 border border-white/30 rounded-lg px-3 py-2">
                    
                    <!-- ICON -->
                    <svg class="w-5 h-5 text-white mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"/>
                        <path d="M6 20c0-3.3137 2.6863-6 6-6s6 2.6863 6 6"/>
                    </svg>

                    <input type="text" name="email"
                        placeholder="Email"
                        class="bg-transparent w-full outline-none text-white placeholder-gray-300">
                </div>
            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
                <div class="flex items-center bg-white/10 border border-white/30 rounded-lg px-3 py-2">
                    
                    <!-- ICON -->
                    <svg class="w-5 h-5 text-white mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                        <path d="M16 10V7a4 4 0 00-8 0v3"/>
                    </svg>

                    <input type="password" name="password"
                        placeholder="Password"
                        class="bg-transparent w-full outline-none text-white placeholder-gray-300">
                </div>

                <div class="text-right mt-1">
                    <a href="#" class="text-xs text-gray-300 hover:underline">
                        Forgot password?
                    </a>
                </div>
            </div>

            <!-- BUTTON -->
            <button type="submit"
                class="w-full border border-white rounded-lg py-2 hover:bg-white hover:text-blue-900 transition">
                Login
            </button>

        </form>

    </div>

</div>

</body>
</html>