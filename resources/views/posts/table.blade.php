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
                <a class="btn btn-sm btn-primary" href="{{ route('posts.edit', $post->id) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <form class="d-inline" action="{{ route('posts.destroy') }}" method="post" data-post-id="{{ $post->id }}">
                    @csrf
                    @method('delete')
                    {{--                            <button onclick="return confirm('Are you sure!')" class="btn btn-sm btn-danger btn-del">--}}
                    {{--                                <i class="fas fa-trash"></i>--}}
                    {{--                            </button>--}}
                    <button class="btn btn-sm btn-danger btn-del">
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

{{ $posts->appends(['search' => request()->search, 'count' => request()->count])->links() }}
{{--{{ $posts->links() }}--}}
