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
            <h2 class="text-red-500 text-xl">Edit</h2>
            <button>            
                <a href="/" class="bg-blue-600 text-white rounded py-2 px-4">Back To Home</a>
            </button>
        </div>

        <div>
            <form method="POST" action="{{ route('update', $ourPost->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-5">

                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $ourPost->name }}" placeholder="Kazi Iftakher Rahman" class="border border-gray-300 rounded p-2 w-full mb-4">
                    @error('name')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror

                    <label for="">Description</label>
                    <input type="text" name="description" value="{{ $ourPost->description }}" placeholder="Learning Laravel" class="border border-gray-300 rounded p-2 w-full mb-4">
                    @error('description')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror

                    <label for="">Select image</label>
                    <input type="file" name="image">
                    @error('image')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror

                    <input type="submit" value="Submit Post" class="bg-green-600 text-white rounded py-2 px-4 mt-4">
                </div>
            </form>
        </div>
        
    </div>

</body>
</html>