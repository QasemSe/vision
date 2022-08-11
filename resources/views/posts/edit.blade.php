<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Edit Post : <span class="text-danger">{{ $post->title }}</span></h1>
            <a href="{{ route('posts.index') }}" class="btn btn-dark w-25">All Posts</a>
        </div>

        @if(session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title', $post->title) }}">
                @error('title')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror

            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Image">
                @error('image')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
                <img width="80px" src="{{ asset('uploads/' . $post->image) }}" alt="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="">Body</label>
                <textarea id="mytextarea" name="body" class="form-control @error('body') is-invalid @enderror">{{ old('body', $post->body) }}</textarea>
                @error('body')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success px-5">Update</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/tinymce.min.js" integrity="sha512-cJ2vUNryvHzgNJfmFTtZ2VX5EMT5JOU1i8nm+L1kwoHQ9bSqSYdswxyk++9Gi27p3BG2rXZXLMsTsluY4RZSSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</body>
</html>
