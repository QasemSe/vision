<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts | Trash</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .table th, .table td{
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>All Posts</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-dark w-25">Add new post</a>
        </div>

        @if(session('msg'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="table-content">
            <table class="table table-bordered table-hover table-striped">
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Viewers</th>
                    <th>Created At</th>
                    <th>Updated AT</th>
                    <th>Actions</th>
                </tr>

                @forelse($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td><img width="80px" src="{{ asset('uploads/' . $post->image) }}" alt="{{ $post->title }}"></td>
                        <td>{{ $post->viewer }}</td>
                        <td>{{ $post->created_at->format('M d, Y') }}</td>
                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                        <td>
                            <form class="d-inline" action="{{ route('posts.restore', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fas fa-undo"></i>
                                </button>
                            </form>
                            <form class="d-inline" action="{{ route('posts.delete', $post->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger btn-del">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No Data Found</td>
                    </tr>
                @endforelse

            </table>

        </div>
    </div>

</body>
</html>
