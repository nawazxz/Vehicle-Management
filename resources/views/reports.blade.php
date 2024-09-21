<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #2c2c2c;
        }
        h1, h2 {
            color: #e0e0e0;
        }
    </style>
</head>
<body>
    <h1>Check-in and Check-out Report</h1>
    <div class="col-lg-12">
        <div class="card mb-4">
            <h5 class="card-header">Recent Check-Ins</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Check-In Time</th>
                            <th>Check-In Mileage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($checkins as $checkin)
                            <tr>
                                <td>{{ $checkin->checkin_time }}</td>
                                <td>{{ $checkin->mileage }} km</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Check-Outs -->
        <div class="card mb-4">
            <h5 class="card-header">Recent Check-Outs</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Check-Out Time</th>
                            <th>Check-Out Mileage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($checkouts as $checkout)
                            <tr>
                                <td>{{ $checkout->checkout_time }}</td>
                                <td>{{ $checkout->checkout_mileage }} km</td>
                            </tr>
                        @endforeach
                    </tbody>

                    <h2>Expenses</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Expense Name</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $expense)
                                <tr>
                                    <td>{{ $expense->id }}</td>
                                    <td>{{ $expense->name }}</td>
                                    <td>${{ number_format($expense->amount, 2) }}</td>
                                    <td>{{ $expense->date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </table>
            </div>
        </div>

        <!-- Download Report Button -->
        
    </div>
</body>
</html>
