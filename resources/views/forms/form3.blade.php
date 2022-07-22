<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Add New Post</h1>

        @include('forms.errors')

        <form action="{{ route('form3') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" placeholder="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}">
                @error('title') <small class="invalid-feedback">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="body">Body</label>
                <textarea id="my_text_area" maxlength="100" name="body" placeholder="Body" class="form-control @error('body') is-invalid @enderror" rows="5">{{ old('body') }}</textarea>
                <span id="counter">0</span> / 100
                @error('body') <small class="invalid-feedback">{{ $message }}</small> @enderror
            </div>
            <button class="btn btn-warning w-100">Add</button>
        </form>
    </div>

{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}

{{--    <script>--}}
{{--        $('#my_text_area').keyup(function () {--}}
{{--            var count = $('#my_text_area').val().length;--}}

{{--            if (count == 100) {--}}
{{--                $('#counter').css('color', 'red')--}}
{{--            } else {--}}
{{--                $('#counter').css('color', 'black')--}}
{{--            }--}}

{{--            $('#counter').text(count)--}}
{{--        })--}}
{{--    </script>--}}
{{--    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.0/tinymce.min.js" integrity="sha512-dr3qAVHfaeyZQPiuN6yce1YuH7YGjtUXRFpYK8OfQgky36SUfTfN3+SFGoq5hv4hRXoXxAspdHw4ITsSG+Ud/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
            tinymce.init({
            selector: '#my_text_area',
            toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
            })
    </script>
</body>
</html>
