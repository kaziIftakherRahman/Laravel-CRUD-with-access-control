<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriNish - Edit Post</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Inter for body, Pacifico for brand text -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Pacifico&display=swap" rel="stylesheet">

    <script>
        // Custom Tailwind configuration (same as the dashboard)
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
        /* Reusing the same custom component styles for consistency */
        @layer components {
            .btn {
                @apply inline-block px-6 py-2.5 text-sm font-semibold text-white rounded-lg shadow-md transition-transform duration-300 ease-in-out transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2;
            }
            .btn-primary {
                @apply btn bg-brand-dark hover:bg-black;
            }
            .btn-secondary {
                @apply inline-block px-6 py-2.5 text-sm font-semibold text-brand-dark bg-gray-200 rounded-lg shadow-sm transition-colors duration-300 ease-in-out hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2;
            }
            /* Custom styles for form inputs */
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

    <!-- ========== HEADER (Consistent with Dashboard) ========== -->
    <header class="sticky top-0 z-50 w-full p-4">
        <nav class="max-w-6xl w-full bg-white/70 backdrop-blur-lg rounded-xl mx-auto flex items-center justify-between p-2 shadow-sm">
            <!-- Logo -->
            <a class="flex items-center gap-2 flex-none py-1 text-xl font-semibold" href="/" aria-label="NutriNish">
                <img src="https://googleusercontent.com/file_content/0" class="w-12 h-12" alt="NutriNish Logo" onerror="this.onerror=null;this.src='https://placehold.co/50x50/F8AFA6/FFFFFF?text=NN';">
                <span class="font-brand text-2xl text-brand-dark hidden sm:inline">Nutri Nish</span>
            </a>
            
            <!-- Actions -->
            <div class="btn-primary flex items-center gap-4">
                <a href="/" class="text-sm font-medium text-white-600 transition-colors">
                    Back to Dashboard
                </a>
            </div>
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Form Container -->
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-md">
            
            <!-- Form Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-brand-dark">Edit NutriByte</h1>
                <p class="text-gray-500 mt-2">Refine your post to make it even better.</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('update', $ourPost->id) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT') {{-- Use PUT/PATCH for updates --}}
                
                <!-- Name Field -->
                <div>
                    <label for="name" class="form-label">Post Title</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $ourPost->name) }}" placeholder="e.g., The Benefits of a Balanced Diet" class="form-input">
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description Field -->
                <div>
                    <label for="description" class="form-label">Content / Description</label>
                    <textarea id="description" name="description" rows="8" placeholder="Write your mini-blog post here..." class="form-input resize-y">{{ old('description', $ourPost->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Upload Field -->
                <div>
                    <label for="image" class="form-label">Update Featured Image</label>
                    <div class="flex items-center gap-4 mt-2">
                        <img src="{{ asset('images/' . $ourPost->image) }}" alt="Current Image" class="w-20 h-20 rounded-lg object-cover" onerror="this.onerror=null;this.src='https://placehold.co/80x80/FDECEC/333333?text=Image'; this.classList.add('p-2');">
                        <input type="file" id="image" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-brand-light-pink file:text-brand-dark hover:file:bg-brand-pink/80">
                    </div>
                     <p class="text-xs text-gray-500 mt-2">Leave blank to keep the current image.</p>
                    @error('image')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Submission -->
                <div class="pt-4 flex justify-end">
                    <button type="submit" class="btn-primary w-full sm:w-auto">Update Post</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
