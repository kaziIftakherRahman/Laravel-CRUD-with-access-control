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
                @apply btn bg-red-500 hover:bg-red-700;
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
        <nav class="max-w-3xl w-full bg-white/70 backdrop-blur-lg rounded-xl mx-auto flex items-center justify-center p-2 shadow-sm">
            <!-- Logo -->
            <a class="flex items-center gap-2 flex-none py-1 text-xl font-semibold" href="#" aria-label="NutriNish">
                <img src="images\nutrinish_logo.png" class="w-12 h-12" alt="NutriNish Logo" onerror="this.onerror=null;">
                <p>presents</p>
                <span class="font-brand text-2xl text-brand-dark hidden sm:inline">NutriMinis</span>
            </a>
            
            @can('is-admin')
            <!-- Actions -->
                <div class="flex items-center gap-4 mx-8"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn-primary text-sm font-medium text-white-600 hover:text-white hover:bg-red-700 transition-colors">Logout</button>
                    </form>                  
                </div>
            @endcan
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

    <!-- ========== FOOTER ========== -->
    <footer class="bg-brand-dark text-white" id="footer">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            
            <!-- Main Footer Content (Centered) -->
            <div class="text-center">
                
                <!-- Logo and Motto -->
                <a class="inline-block mb-4" href="/" aria-label="NutriNish">
                    <img src="{{ asset('images/nutrinish_logo.png') }}" class="w-16 h-16 mx-auto" alt="NutriNish Logo" onerror="this.onerror=null;this.src='https://placehold.co/64x64/FFFFFF/333333?text=NN';">
                </a>
                <p class="font-brand text-2xl text-white mb-2">NutriMinis</p>
                <p class="max-w-md mx-auto text-base text-gray-300 mb-8">
                    "Fueling your wellness with my nutrition insights."
                </p>

                <!-- Contact Information and Social Links -->
                <div class="flex justify-center items-center flex-wrap gap-x-6 gap-y-4 text-sm mb-8">
                    <!-- Phone -->
                    <a href="tel:+8801851005712" class="flex items-center gap-2 text-gray-300 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.518.76a11.034 11.034 0 006.364 6.364l.76-1.518a1 1 0 011.06-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        <span>+880 1851-005712</span>
                    </a>
                    
                    <!-- Email -->
                    <a href="mailto:nishatlamia95@gmail.com" class="flex items-center gap-2 text-gray-300 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        <span>nishatlamia95@gmail.com</span>
                    </a>

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/profile.php?id=61576099400475" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-gray-300 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd" />
                        </svg>
                        <span>Facebook</span>
                    </a>
                </div>
            </div>
            
            <!-- Bottom Bar with Developer Credit -->
            <div class="border-t border-gray-700 pt-6 mt-8 text-center text-sm text-gray-400">
                <p>&copy; {{ date('Y') }} NutriNish. All Rights Reserved.</p>
                <p class="mt-1">Developed by Kazi Iftakher Rahman</p>
            </div>
            
        </div>
    </footer>
    <!-- ========== END FOOTER ========== -->

    <!-- ========== BACK TO TOP BUTTON ========== -->
    <button id="back-to-top" class="hidden fixed bottom-8 right-8 bg-brand-pink text-brand-dark p-3 rounded-full shadow-lg hover:bg-brand-pink/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-pink transition-opacity duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
        </svg>
    </button>

    <!-- Script for Back to Top Button -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const backToTopButton = document.getElementById('back-to-top');

            // Show or hide the button based on scroll position
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) { // Show button after scrolling 300px
                    backToTopButton.classList.remove('hidden');
                } else {
                    backToTopButton.classList.add('hidden');
                }
            });

            // Smooth scroll to top when the button is clicked
            backToTopButton.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>

</body>
</html>
