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
            <h2 class="text-red-500 text-xl">Create</h2>
            <button>            
                <a href="/" class="bg-blue-600 text-white rounded py-2 px-4">Back To Home</a>
            </button>
        </div>

        <div>
            <form method="POST" action="{{ route('store') }}">
                @csrf
                <div class="flex flex-col gap-5">
                    <input type="text" name="name" placeholder="Name" class="border border-gray-300 rounded p-2 w-full mb-4">
                    <input type="text" name="description" placeholder="Description" class="border border-gray-300 rounded p-2 w-full mb-4">
                    <input type="file" name="image">
                    <input type="submit" value="Create Post" class="bg-green-600 text-white rounded py-2 px-4 mt-4">
                </div>
            </form>
        </div>
        
    </div>

</body>
</html>