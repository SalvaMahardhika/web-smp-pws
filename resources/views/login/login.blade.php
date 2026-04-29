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

                    <div class="relative">
    <input 
        type="password" 
        id="loginPassword"
        name="password" 
        placeholder="Password"
        class="w-full px-10 pr-10 py-3 rounded-xl bg-white/10 text-white placeholder-gray-300 outline-none border border-white/30"
    >
    <!-- ICON EYE (KANAN) -->
    <span onclick="toggleLoginPassword(this)" 
        class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer text-white/70">
        
        <!-- eye -->
        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
        </svg>

        <!-- eye off -->
        <svg id="eyeClose" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.27-2.943-9.543-7a9.956 9.956 0 012.293-3.95m3.13-2.18A9.956 9.956 0 0112 5c4.478 0 8.27 2.943 9.543 7a9.965 9.965 0 01-4.043 5.043M15 12a3 3 0 00-3-3m0 0a3 3 0 00-3 3m3-3v6"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3l18 18"/>
        </svg>

    </span>
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

<script>
function toggleLoginPassword(el) {
    const input = document.getElementById("loginPassword");
    const eyeOpen = el.querySelector("#eyeOpen");
    const eyeClose = el.querySelector("#eyeClose");

    if (input.type === "password") {
        input.type = "text";
        eyeOpen.classList.add("hidden");
        eyeClose.classList.remove("hidden");
    } else {
        input.type = "password";
        eyeOpen.classList.remove("hidden");
        eyeClose.classList.add("hidden");
    }
}
</script>
</body>
</html>