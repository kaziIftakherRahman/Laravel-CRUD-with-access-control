<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style type="text/tailwindcss">
        @layer utilities {
        .container {
            @apply mx-auto px-10;
        }
        }
    </style>
    <title>CRUD project</title>
</head>
<body>
    <div class="container">
        <div class="flex justify-between items-center my-4">
            <h2 class="text-red-500 text-xl">HOME</h2>
            <button>            
                <a href="/create" class="bg-green-600 text-white rounded py-2 px-4">Add New Post</a>
            </button>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        
        @endif
        
    </div>

</body>
</html>