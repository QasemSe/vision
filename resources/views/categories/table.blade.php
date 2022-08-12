<table class="table table-bordered table-hover table-striped">
    <tr class="table-dark">
        <th>ID</th>
        <th>Name</th>
        <th>Created At</th>
        <th>Updated AT</th>
        <th>Actions</th>
    </tr>

    @forelse($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->created_at->format('M d, Y') }}</td>
            <td>{{ $category->updated_at->diffForHumans() }}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('categories.edit', $category->id) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <form class="d-inline" action="{{ route('categories.destroy') }}" method="POST" data-category-id="{{ $category->id }}">
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

{{ $categories->appends(['search' => request()->search, 'count' => request()->count])->links() }}
{{--{{ $categories->links() }}--}}
