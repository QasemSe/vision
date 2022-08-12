<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
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
            <h1>All Categories</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-dark w-25">Add new category</a>
        </div>

        @if(session('msg'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('categories.index') }}" method="get">
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

        <div class="table-content">
            @include('categories.table')

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
            return false;
        };

        $('body').on('click', '.btn-del', function (event) {
            event.preventDefault();

            var url = $(this).parent().attr('action');
            var category_id = $(this).parent().data('category-id');
            var row = $(this).parents('tr');


            var search = getUrlParameter('search');
            if (!search) {
                search = null
            }
            var count = getUrlParameter('count');
            if (!count) {
                count = null
            }
            Swal.fire({

                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'

            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token : '{{ csrf_token() }}',
                            _method: 'delete',
                            category_id: category_id,
                            search: search,
                            count: count
                        },
                        success: function (res){
                            $('.table-content').html(res);
                            // row.remove();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        },
                        error:function (error){
                            console.log('Error')
                        }
                    });


                }
            })


        });
    </script>

</body>
</html>
