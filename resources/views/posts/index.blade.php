<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
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

        <form action="{{ route('posts.index') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control w-50" placeholder="Search about anything.." aria-label="Search about anything.." aria-describedby="button-addon2" name="search" value="{{ request()->search }}">
                <select name="count" class="form-select w-25">
                    <option {{ request()->count == 10 ? 'selected' : null }} value="10">10</option>
                    <option {{ request()->count == 15 ? 'selected' : null }} value="15">15</option>
                    <option {{ request()->count ? '' : 'selected' }} {{ request()->count == 20 ? 'selected' : null }} value="20">20</option>
                    <option {{ request()->count == 25 ? 'selected' : null }} value="25">25</option>
                    <option {{ request()->count == 'all' ? 'selected' : null }} value="all">All</option>
                </select>
                <button class="btn btn-outline-dark" id="button-addon2">Search</button>
            </div>
        </form>
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
                        <a class="btn btn-sm btn-primary" href="#">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form class="d-inline" action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Are you sure!')" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
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

{{--        {{ $posts->appends(['search' => request()->search, 'count' => request()->count])->links() }}--}}
        {{ $posts->appends($_GET)->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script>
        setTimeout(() => {
            document.querySelector('.alert').remove();
        }, 3000);

        // setInterval(() => {
        //     console.log('Interval')
        // }, 2000);
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('msg'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session('msg') }}',
            icon: 'success',
            confirmButtonText: 'Done'
        })
    </script>
    @endif

</body>
</html>
