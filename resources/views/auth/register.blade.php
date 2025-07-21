<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - NutriByte</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Inter for body, Pacifico for brand text -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Pacifico&display=swap" rel="stylesheet">

    <script>
        // Custom Tailwind configuration (same as the other pages)
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'sans-serif'],
                        'brand': ['Pacifico', 'cursive'],
                    },
                    colors: {
                        'brand-pink': '#F8AFA6',
                        'brand-light-pink': '#FDECEC',
                        'brand-dark': '#333333',
                        'brand-gray': '#F4F4F4',
                        'brand-success': '#4CAF50',
                        'brand-danger': '#F44336',
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        /* Using the same component styles for consistency */
        @layer components {
            .btn-primary {
                @apply w-full inline-block px-6 py-3 text-sm font-semibold text-white bg-brand-dark rounded-lg shadow-md transition-transform duration-300 ease-in-out transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-dark;
            }
            .form-input {
                @apply block w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-lg focus:border-brand-pink focus:ring-brand-pink focus:ring-opacity-50;
            }
            .form-label {
                @apply text-sm font-medium text-gray-700 mb-2 block;
            }
        }
    </style>
</head>
<body class="bg-brand-gray font-sans text-brand-dark">

    <div class="flex items-center justify-center min-h-screen p-4">
        
        <div class="w-full max-w-md">
            <!-- Logo and Header -->
            <div class="text-center mb-8">
                <a href="/" class="inline-block">
                    <img src="{{ asset('images/nutrinish_logo.png') }}" class="w-20 h-20 mx-auto" alt="NutriNish Logo" onerror="this.onerror=null;this.src='https://placehold.co/80x80/F8AFA6/FFFFFF?text=NN';">
                </a>
                <h1 class="font-brand text-4xl text-brand-dark mt-4">Create Your Account</h1>
                <p class="text-gray-500 mt-2">Join the NutriBytes community.</p>
            </div>

            <!-- Registration Form Card -->
            <div class="bg-white p-8 rounded-2xl shadow-md">
                
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="form-input" placeholder="Your Name">
                        @error('name')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" class="form-input" placeholder="you@example.com">
                        @error('email')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" class="form-input" placeholder="••••••••">
                        @error('password')
                             <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-input" placeholder="••••••••">
                        @error('password_confirmation')
                             <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="btn-primary">
                            Register
                        </button>
                    </div>
                </form>

                <!-- Login Link -->
                <p class="text-center text-sm text-gray-600 mt-8">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-medium text-brand-dark hover:text-brand-pink underline">
                        Log in here
                    </a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>
