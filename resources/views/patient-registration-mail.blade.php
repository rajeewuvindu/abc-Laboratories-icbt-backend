<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Registration Confirmation</h1>
        <p>Dear {{ $user->name }},</p>
        <p>Thank you for registering with our service!</p>
        <p>Your Patient ID is: <strong>{{ $patientID }}</strong></p>
        <p>Please keep this ID safe for future reference.</p>
        <p>If you have any questions or concerns, feel free to <a href="">contact us</a>.</p>
        <p>Best regards,<br>{{ config('app.name') }}</p>
    </div>
</body>

</html>