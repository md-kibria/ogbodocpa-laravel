<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ url('/favicon.ico') }}">
    <title>404 - Page Not Found</title>
    @vite('resources/css/app.css')
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(99, 102, 241, 0.5);
            }

            50% {
                box-shadow: 0 0 40px rgba(99, 102, 241, 0.8);
            }
        }

        .float {
            animation: float 3s ease-in-out infinite;
        }

        .spin-slow {
            animation: spin-slow 20s linear infinite;
        }

        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }
    </style>
</head>
<div
    class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Animated background elements -->
    {{-- <div
        class="absolute top-10 left-10 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
    </div>
    <div
        class="absolute top-1/2 right-10 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
    </div>
    <div
        class="absolute bottom-10 left-1/2 w-72 h-72 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000">
    </div> --}}

    <!-- Main content -->
    <div class="relative z-10 text-center px-6 max-w-2xl">
        <!-- Floating 404 text -->
        <div class="mb-8">
            <h1
                class="text-9xl md:text-[140px] font-black bg-gradient-to-r from-purple-400 via-pink-400 to-indigo-400 bg-clip-text text-transparent float">
                404
            </h1>
        </div>

        <!-- Animated orb -->
        <div class="mb-8 flex justify-center">
            <div class="relative w-32 h-32">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-full pulse-glow">
                </div>
                <div
                    class="absolute inset-2 bg-gradient-to-br from-slate-900 to-purple-900 rounded-full flex items-center justify-center">
                    <span class="text-4xl spin-slow">🔍</span>
                </div>
            </div>
        </div>

        <!-- Text content -->
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
            Oops! Page Lost in Space
        </h2>

        <p class="text-lg md:text-xl text-gray-300 mb-8 leading-relaxed">
            The page you're looking for has ventured beyond the digital horizon. It might have been moved, deleted, or
            never existed at all.
        </p>

        <!-- Action buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/"
                class="px-8 py-3 bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold rounded-lg hover:shadow-lg hover:shadow-purple-500/50 transition-all duration-300 transform hover:scale-105">
                🏠 Back to Home
            </a>
            <a href="javascript:history.back()"
                class="px-8 py-3 border-2 border-purple-400 text-purple-300 font-semibold rounded-lg hover:bg-purple-500/10 transition-all duration-300 transform hover:scale-105">
                ← Go Back
            </a>
        </div>

        <!-- Fun fact -->
        <div class="mt-12 pt-8 border-t border-purple-500/30">
            <p class="text-gray-400 text-sm">
                Fun fact: In web history, 404 errors have become legendary. This one was specially crafted for you!
            </p>
        </div>
    </div>

    <script>
        // Add animation-delay classes dynamically
        const style = document.createElement('style');
        style.textContent = `
            @keyframes blob {
                0%, 100% { transform: translate(0, 0) scale(1); }
                25% { transform: translate(20px, -50px) scale(1.1); }
                50% { transform: translate(-20px, 20px) scale(0.9); }
                75% { transform: translate(50px, 50px) scale(1.05); }
            }
            .animate-blob { animation: blob 7s infinite; }
            .animation-delay-2000 { animation-delay: 2s; }
            .animation-delay-4000 { animation-delay: 4s; }
        `;
        document.head.appendChild(style);
    </script>

    @vite('resources/js/app.js')
</div>

</html>
