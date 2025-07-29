<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriMinis By NutriNish</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Inter for body, Pacifico for brand text -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Pacifico&display=swap" rel="stylesheet">

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

    <!-- Alpine.js for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style type="text/tailwindcss">
        /* Custom component styles */
        @layer components {
            .btn {
                @apply inline-block px-6 py-2.5 text-sm font-semibold text-white rounded-lg shadow-md transition-transform duration-300 ease-in-out transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2;
            }
            .btn-primary {
                @apply btn bg-brand-dark hover:bg-black;
            }
            .btn-danger {
                @apply btn bg-brand-danger hover:bg-red-700;
            }
            .btn-danger-outline {
                 @apply inline-block px-6 py-2.5 text-sm font-semibold text-brand-danger bg-white border border-brand-danger rounded-lg shadow-sm transition-colors duration-300 ease-in-out hover:bg-brand-danger hover:text-white focus:outline-none focus:ring-2 focus:ring-brand-danger focus:ring-offset-2;
            }
        }
        /* Styling for Laravel Pagination */
        .pagination nav {
            @apply flex justify-center items-center space-x-2;
        }
        .pagination span, .pagination a {
            @apply px-4 py-2 rounded-md text-sm;
        }
        .pagination .pagination-active span {
            @apply bg-brand-dark text-white;
        }
        .pagination a {
            @apply text-gray-600 hover:bg-brand-gray;
        }
    </style>
</head>
<body class="bg-brand-gray font-sans text-brand-dark">

    <!-- ========== HEADER ========== -->
    <header class="sticky top-0 z-50 w-full p-4">
        <nav class="max-w-6xl w-full bg-white/70 backdrop-blur-lg rounded-xl mx-auto flex items-center justify-between p-2 shadow-sm">
            <!-- Logo -->
            <a class="flex items-center gap-2 flex-none py-1 text-xl font-semibold" href="#" aria-label="NutriNish">
                <img src="images\nutrinish_logo.png" class="w-12 h-12" alt="NutriNish Logo" onerror="this.onerror=null;">
                <p>presents</p>
                <span class="font-brand text-2xl text-brand-dark hidden sm:inline">NutriMinis</span>
            </a>
            
            <!-- Actions -->
            <div class="flex items-center gap-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-medium text-gray-600 hover:text-brand-dark transition-colors">Logout</button>
                </form>
                <a class="hidden sm:inline-block px-5 py-2 text-sm font-semibold text-white bg-brand-dark rounded-lg shadow-md hover:bg-black transition-all" href="#">
                    Book a call
                </a>
            </div>
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    

    <!-- ========== MAIN CONTENT ========== -->
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-brand-dark">Welcome to <span class="font-brand">NutriMinis</span></h1>
            <p class="text-lg text-gray-600 mt-4">Your daily dose of nutritional wisdom from NutriNish.</p>
        
            @can('is-admin')
                <div class="mt-8">
                    <a href="/posts/create" class="btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block -mt-1 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Add New Post
                    </a>
                </div>
            @endcan
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-brand-light-pink border-l-4 border-brand-pink text-brand-dark p-4 rounded-md mb-8 shadow-sm" role="alert">
                <p class="font-bold">Success</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Blade loop to iterate over posts --}}
            @foreach ($posts as $post)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden group transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-1.5 flex flex-col">
                <!-- Card Image Container -->
                <div class="aspect-square max-h-100 overflow-hidden w-full bg-transparent p-4 ">
                    <!-- The 'object-contain' class fits the image within the container without stretching -->
                    <img class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300" src="{{ asset('images/' . $post->image) }}" alt="Image for {{ $post->name }}" onerror="this.onerror=null;this.src='https://placehold.co/400x400/FDECEC/333333?text=Image+Not+Found';">
                </div>
                
                <!-- Card Content -->
                <div class="p-6 pt-2 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold text-brand-dark mb-2">
                        {{ $post->name }}
                    </h3>

                    <!-- Description with See More/Less Toggle -->
                    <div x-data="{ expanded: false }" class="flex-grow">
                        <!-- Render HTML from the text editor -->
                        <div x-bind:class="expanded ? '' : 'line-clamp-4'" class="prose prose-sm max-w-none text-gray-600 mb-2">
                            {!! $post->description !!}
                        </div>
                        <button @click="expanded = !expanded" class="text-brand-dark font-semibold text-sm hover:underline">
                            <span x-text="expanded ? 'See less' : 'See more'"></span>
                        </button>
                    </div>
                    
                    <!-- Card Actions -->
                    @can('is-admin')
                    <div class="mt-auto flex justify-end items-center gap-3 pt-4 border-t border-gray-100">
                        <a href="{{route('edit', $post->id)}}" class="btn-primary">Edit</a>
                        <form method="post" class="inline" action="{{ route('delete', $post->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-danger-outline">Delete</button>
                        </form>
                    </div>
                    @endcan
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 pb-10 pagination">
            {{ $posts->links() }}
        </div>

    </main>

</body>
</html>
