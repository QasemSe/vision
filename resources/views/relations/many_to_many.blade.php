<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Many To Many</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

</head>
<body>

    <div class="container my-5">
        <form action="{{ route('many_to_many') }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <tr class="table-success">
                    <th style="width: 5%;">
                        <input type="checkbox" id="check_all">
                    </th>
                    <th>Name</th>
                    <th>Hours</th>
                </tr>
                @foreach($subjects as $subject)
                    <tr>
                        <td>
                            <input {{ $std->subjects->find($subject->id) ? 'checked' : '' }} type="checkbox" name="subject[]" value="{{ $subject->id }}">
                        </td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->hours }}</td>
                    </tr>
                @endforeach
            </table>
            <button class="btn btn-success mt-3 px-5">Register</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('#check_all').on('click', function () {
            $('input[type=checkbox]').prop('checked', this.checked)
        })
    </script>
</body>
</html>
