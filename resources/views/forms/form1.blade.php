<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Form</h1>
        <form action="{{ route('form1') }}" method="post">
            @csrf
            <label for="">Your Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name here..">
            <div class="text-center">
                <button class="btn btn-primary mt-2 px-5" type="submit">Send</button>
            </div>
        </form>
    </div>
</body>
</html>
