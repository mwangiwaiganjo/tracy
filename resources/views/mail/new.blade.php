<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request Approved</title>
    <style>
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
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
        }

        p {
            color: #333333;
        }

        .days-remaining {
            color: #28a745;
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #868686;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Leave Request Has Been Approved</h1>
        <p>Congratulations! Your leave request has been approved. You are now officially on leave.</p>
        <p>You leave is from <span style="color: #28a745">{{$start_date}}</span> to <span style="color: red">{{$end_date}}</span>  </p>
        <p class="days-remaining">Number of Leave Days Remaining This Year: {{$days}}</p>
        <p>If you have any questions or concerns, feel free to contact the HR department.</p>

        <div class="footer">
            <p>Thank you,</p>
            <p>Nairobi Sports Club</p>
        </div>
    </div>
</body>
</html>
