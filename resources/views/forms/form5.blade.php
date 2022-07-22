<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 5</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <style>
        .chat {
            width: 100%;
            margin: 0 auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, .158);
            border-radius: 5px;
            padding: 20px;
            height: 500px;
            overflow-y: auto;
        }
        .chat .client {
            background: #f5f5f5;
            border-radius: 10px;
            width: 80%;
            padding: 10px 20px;
            margin-bottom: 10px;
        }
        .chat .agent {
            background: #bbedff;
            border-radius: 10px;
            width: 80%;
            margin-left: auto;
            text-align: right;
            padding: 10px 20px;
            margin-bottom: 10px;
        }
        .chat h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .chat p {
            font-size: 14px;
            margin-bottom: 0;
        }

        .chat div {
            position: relative;
        }
        .chat button {
            border: none;
            width: 20px;
            height: 20px;
            background: #d7d7d7;
            font-size: 12px;
            border-radius: 50%;
            padding: 0;
            position: absolute;
            top: -8px;
            right: -8px;
        }

        .chat .agent button {
            left: -8px;
        }

        .chat button:hover {
            background: #ec4040;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Ajax</h1>

        <div class="row">
            <div class="col-md-3 text-center">
                <form action="" id="client-form">
                    <h2>Client Area</h2>
                    <input type="text" class="form-control">
                </form>
            </div>
            <div class="col-md-6">
                <div class="chat"></div>
            </div>
            <div class="col-md-3 text-center">
                <form action="" id="agent-form">
                    <h2>Agent Area</h2>
                    <input type="text" class="form-control">
                </form>
            </div>
        </div>

        <form action="{{ route('form5') }}" method="post">
            @csrf

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $('#client-form').submit(function (e) {
            e.preventDefault();
            var text = $('#client-form input').val();

            $.ajax({
                type: 'post',
                url: '{{ route('form5') }}',
                data: {
                    t: text,
                    _token: '{{ csrf_token() }}'
                },
                success: function (res) {
                    var msg = `<div class="client">
                        <h4>Name - <small>${res}</small></h4>
                        <p>${text}</p>
                        <button>x</button>
                    </div>`
                    $('.chat').append(msg);
                    $('#client-form input').val('');
                }
            });
        })
        $('#agent-form').submit(function (e) {
            e.preventDefault();
            var text = $('#agent-form input').val();

            $.ajax({
                type: 'post',
                url: '{{ route('form5') }}',
                data: {
                    t: text,
                    _token: '{{ csrf_token() }}'
                },
                success: function (res) {
                    var msg = `<div class="agent">
                        <h4>Name - <small>${res}</small></h4>
                        <p>${text}</p>
                        <button>x</button>
                    </div>`
                    $('.chat').append(msg);
                    $('#agent-form input').val('');
                }
            });
        })

        $('.chat').on('click', 'button', function () {
            if(confirm('Are you sure?!')) {
                $(this).parent().remove()
            }
        });
    </script>
</body>
</html>
