<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background: #eee; font-family: Arial, Helvetica, sans-serif">

    <div style="background: white; width: 600px; padding: 30px; border: 1px solid #bbb; margin: 30px auto">

        <h3>Dear Admin,</h3>
        <p>Hope this email find you will</p>
        <br>
        <p>There is new contact email as bellow</p>
        <p><b>Name: </b>{{ $data['name'] }}</p>
        <p><b>Email: </b>{{ $data['email'] }}</p>
        <p><b>Message: </b>{{ $data['message'] }}</p>
        <br>
        <br>
        <p>Best Regards</p>
    </div>

</body>
</html>
