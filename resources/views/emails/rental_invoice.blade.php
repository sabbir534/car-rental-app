<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Invoice</title>
</head>

<body>
    <h1>Rental Invoice</h1>
    <p>Dear {{ $rental->user->name }},</p>

    <p>Thank you for renting with us! Below are the details of your rental:</p>

    <table style="border: 1px solid #ddd; width: 100%; margin-top: 20px;">
        <tr>
            <th style="text-align: left; padding: 8px; background-color: #f2f2f2;">Rental ID</th>
            <td style="padding: 8px;">{{ $rental->id }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 8px; background-color: #f2f2f2;">Car</th>
            <td style="padding: 8px;">{{ $rental->car->name }} - {{ $rental->car->brand }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 8px; background-color: #f2f2f2;">Rental Start Date</th>
            <td style="padding: 8px;">{{ $rental->start_date }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 8px; background-color: #f2f2f2;">Rental End Date</th>
            <td style="padding: 8px;">{{ $rental->end_date }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 8px; background-color: #f2f2f2;">Total Cost</th>
            <td style="padding: 8px;">${{ number_format($rental->total_cost, 2) }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 8px; background-color: #f2f2f2;">Status</th>
            <td style="padding: 8px;">{{ $rental->status }}</td>
        </tr>
    </table>

    <p>If you have any questions, feel free to contact us.</p>

    <p>Best regards,<br>Car Rental Service Team</p>
</body>

</html>
