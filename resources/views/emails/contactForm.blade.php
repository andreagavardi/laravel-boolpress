<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>

<body>

    <h4>You have a new Message:</h4>
    <div class="mail">
        <span>From: <strong>{{$data['full_name']}}</strong></span><br>
        <span>Email Address: <strong>{{$data['email']}}</strong></span>
        <p> <strong> Message:</strong>{{$data['message']}}</p>
    </div>

</body>

</html>
