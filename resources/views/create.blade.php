<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriNish - Create New Post</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Pacifico&display=swap" rel="stylesheet">

    <!-- NEW: Trix Rich Text Editor -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <script>
        // Custom Tailwind configuration
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
        /* Component Styles */
        @layer components {
            .btn-primary {
                @apply inline-block px-6 py-2.5 text-sm font-semibold text-white bg-brand-dark rounded-lg shadow-md transition-transform duration-300 ease-in-out transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2;
            }
            .form-input {
                @apply block w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-lg focus:border-brand-pink focus:ring-brand-pink focus:ring-opacity-50;
            }
            .form-label {
                @apply text-sm font-medium text-gray-700 mb-2 block;
            }
        }
        /* Custom styles for Trix to match the theme */
        trix-toolbar .trix-button-group {
            @apply border-gray-300;
        }
        trix-toolbar .trix-button {
            @apply bg-gray-50;
        }
        trix-toolbar .trix-button:not(:first-child) {
            @apply border-l border-gray-300;
        }
        trix-toolbar .trix-button--icon:hover {
            @apply bg-gray-200;
        }
        trix-toolbar .trix-button.trix-active {
            @apply bg-brand-dark text-white;
        }
        trix-editor {
            @apply min-h-[12rem] p-4 border-x border-b border-gray-300 rounded-b-lg focus:outline-none focus:border-brand-pink focus:ring-1 focus:ring-brand-pink;
        }
    </style>
</head>
<body class="bg-brand-gray font-sans text-brand-dark">

    <!-- ========== HEADER ========== -->
    <header class="sticky top-0 z-50 w-full p-4">
        <nav class="max-w-6xl w-full bg-white/70 backdrop-blur-lg rounded-xl mx-auto flex items-center justify-between p-2 shadow-sm">
            <a class="flex items-center gap-2 flex-none py-1 text-xl font-semibold" href="/" aria-label="NutriNish">
                <img src="{{ asset('images/nutrinish_logo.png') }}" class="w-12 h-12" alt="NutriNish Logo" onerror="this.onerror=null;this.src='https://placehold.co/50x50/F8AFA6/FFFFFF?text=NN';">
                <span class="font-brand text-2xl text-brand-dark hidden sm:inline">Nutri Nish</span>
            </a>
            <a href="/" class="text-sm font-medium text-gray-600 hover:text-brand-dark transition-colors">
                Back to Dashboard
            </a>
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-md">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-brand-dark">Create a New NutriByte</h1>
                <p class="text-gray-500 mt-2">Share your latest nutritional insights with the world.</p>
            </div>

            <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <!-- Name Field -->
                <div>
                    <label for="name" class="form-label">Post Title</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="e.g., The Benefits of a Balanced Diet" class="form-input">
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description Field (Now using Trix) -->
                <div>
                    <label for="description" class="form-label">Content / Description</label>
                    <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                    <trix-editor input="description" class="bg-white"></trix-editor>
                    @error('description')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Upload Field -->
                <div>
                    <label for="image" class="form-label">Featured Image</label>
                    <input type="file" id="image" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-brand-light-pink file:text-brand-dark hover:file:bg-brand-pink/80">
                    @error('image')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Submission -->
                <div class="pt-4 flex justify-end">
                    <button type="submit" class="btn-primary w-full sm:w-auto">Create Post</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
