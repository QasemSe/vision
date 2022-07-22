<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 4</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Upload your CV</h1>
        <form action="{{ route('form4') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name') <small class="invalid-feedback">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="">CV</label>
                <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" accept=".pdf">
                @error('cv') <small class="invalid-feedback">{{ $message }}</small> @enderror
            </div>
            <button class="btn btn-success px-5">Upload</button>
        </form>
    </div>
</body>
</html>
