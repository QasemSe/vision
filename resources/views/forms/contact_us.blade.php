<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Contact Us</h1>
        <div class="row justify-content-center">
            <div class="col-md-6 mb-5">
                @include('forms.errors')
                <form action="{{ route('contact_us') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" placeholder="Email" accept=".png,.jpg,.jpeg" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="email">Message</label>
                        <textarea name="message" class="form-control" placeholder="Message" rows="5">{{ old('message') }}</textarea>
                    </div>

                    <button class="btn btn-primary w-25">Send</button>

                </form>
            </div>

            <div class="col-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.278937713089!2d34.458887685003994!3d31.5164979813709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xeae186ae2ddf6da1!2zMzHCsDMwJzU5LjQiTiAzNMKwMjcnMjQuMSJF!5e0!3m2!1sar!2s!4v1659110737677!5m2!1sar!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</body>
</html>
