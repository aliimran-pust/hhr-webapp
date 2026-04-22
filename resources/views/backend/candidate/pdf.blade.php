<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Member Application Full Details</title>
    <style>
        @page { margin: 20px; }
        body {
            font-family: 'nikosh', sans-serif;
            font-size: 9px;
            line-height: 1.2;
        }
        .header { text-align: center; margin-bottom: 20px; }
        .header h2 { margin: 0; padding: 0; font-size: 18px; }
        .header p { margin: 5px 0; font-size: 12px; }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            word-wrap: break-word;
        }
        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: left;
            vertical-align: top;
        }
        th { background-color: #f2f2f2; font-weight: bold; }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: right;
            font-size: 8px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Harikhali High School Reunion-2026</h2>
        <p>Member Application Full Details List</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 20px;">ID</th>
                <th style="width: 70px;">Name (EN/BN)</th>
                <th style="width: 70px;">Parents</th>
                <th style="width: 40px;">Batch/Group</th>
                <th style="width: 60px;">Contact (Mobile/Email)</th>
                <th style="width: 80px;">Addresses (Present/Perm)</th>
                <th style="width: 30px;">T-Shirt</th>
                <th style="width: 60px;">Guest Info</th>
                <th style="width: 30px;">Total Amount</th>
                <th style="width: 50px;">Transaction ID</th>
                <th style="width: 40px;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($candidates as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <strong>{{ $item->name_en }}</strong><br>
                        {{ $item->name_bn }}
                    </td>
                    <td>
                        F: {{ $item->father_name }}<br>
                        M: {{ $item->mother_name }}
                    </td>
                    <td>
                        B: {{ $item->batch_passing_year }}<br>
                        G: {{ $item->group }}
                    </td>
                    <td>
                        {{ $item->mobile }}<br>
                        {{ $item->email }}
                    </td>
                    <td>
                        Pre: {{ $item->present_address }}<br>
                        Per: {{ $item->permanent_address }}
                    </td>
                    <td>{{ $item->t_shirt_size }}</td>
                    <td>
                        Guests: {{ $item->interested_in_guests }} ({{ $item->guest_count ?? 0 }})<br>
                        @if($item->guest_details)
                            @foreach($item->guest_details as $g)
                                - {{ $g['name'] }} ({{ $g['age'] }}, {{ $g['relation'] }})<br>
                            @endforeach
                        @endif
                    </td>
                    <td>{{ $item->total_amount }}</td>
                    <td>{{ $item->transaction_id }}</td>
                    <td>{{ $item->application_status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Printed on: {{ date('d/m/Y h:i A') }} | Page: {PAGE_NUM}
    </div>
</body>
</html>
