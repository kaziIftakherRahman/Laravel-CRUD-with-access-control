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

        .btn {
            @apply bg-green-600 text-white rounded py-2 px-4;
        }
        .btn-red{
            @apply bg-red-600 text-white rounded py-2 px-4;
        }
        }
    </style>
    <title>CRUD project</title>
</head>
<body>
    <div class="container">
        <div class="flex justify-between my-4">
            <h2 class="text-red-500 text-xl">HOME</h2>
            @can('is-admin')
                <button>            
                    <a href="/posts/create" class="btn">Add New Post</a>
                </button>
            @endcan
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-red">Logout</button>
            </form>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="div">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 border border-green-600 my-5">
                        <thead class="bg-green-600 text-white">
                            <tr>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium  uppercase">ID</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium  uppercase">Name</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium  uppercase">Description</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium  uppercase">Image</th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium  uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)

                            <tr class="odd:bg-white even:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $post->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $post->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $post->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><img src="images/{{ $post->image }}" width="80rem" alt=""></td>
               
                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                @can('is-admin')
                                <a href="{{route('edit', $post->id)}}" class="btn">Edit</a>
                                <form method="post" class="inline" action="{{ route('delete', $post->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn-red">Delete</button>
                                </form>
                                @endcan
                            </td>
                            </tr>
                            
                            @endforeach

                            
                        
                        </tbody>
                        </table>
                        {{ $posts->links() }} <!-- Pagination links -->
                        
                        
                    </div>
                    </div>
                </div>
                </div>

        </div>
        
    </div>

</body>
</html>