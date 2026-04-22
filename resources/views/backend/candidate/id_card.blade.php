<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @page {
            margin: 0pt;
        }
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0pt;
            padding: 0pt;
            font-family: 'nikosh', sans-serif;
            background-color: #fff;
            width: 242.65pt;
            height: 362.83pt;
        }
        .id-card {
            width: 242.65pt;
            height: 360pt; /* Slightly less than page height to avoid blank page */
            position: relative;
            overflow: hidden;
            border: 1px solid #6f42c1;
            margin: 0;
        }
        .header {
            background-color: #6f42c1; /* Purple match from navbar */
            color: white;
            padding: 15px 10px;
            text-align: center;
        }
        .header img {
            width: 50px;
            height: auto;
            margin-bottom: 5px;
        }
        .header h2 {
            margin: 0;
            font-size: 16px;
            text-transform: uppercase;
        }
        .header p {
            margin: 0;
            font-size: 10px;
        }
        .photo-area {
            text-align: center;
            margin-top: 20px;
        }
        .photo-area img {
            width: 100px;
            height: 110px;
            border: 3px solid #6f42c1;
            border-radius: 5px;
            object-fit: cover;
        }
        .details {
            padding: 20px;
            text-align: center;
        }
        .details h3 {
            margin: 5px 0;
            color: #333;
            font-size: 18px;
        }
        .details h4 {
            margin: 0;
            color: #555;
            font-size: 14px;
            font-weight: normal;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: #6f42c1;
            color: white;
            text-align: center;
            padding: 8px 0;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="id-card">
        <div class="header">
            @php
                $logoPath = public_path('assets/backend/img/new_logo_PM.jpg');
                $logoData = "";
                if(file_exists($logoPath)){
                    $logoData = base64_encode(file_get_contents($logoPath));
                }
            @endphp
            @if($logoData)
                <img src="data:image/jpg;base64,{{ $logoData }}" alt="Logo">
            @endif
            <h2>Alumni Reunion 2026</h2>
            <h2>Harikhali High School</h2>
        </div>

        <div class="photo-area">
            @php
                $photoPath = storage_path('app/public/' . $candidate->photo);
                $photoData = "";
                if($candidate->photo && file_exists($photoPath)){
                    $photoData = base64_encode(file_get_contents($photoPath));
                }
            @endphp
            @if($photoData)
                <img src="data:image/png;base64,{{ $photoData }}" alt="Member Photo">
            @else
                <div style="width:120px; height:130px; background:#eee; margin:0 auto; line-height:110px; color:#aaa; border: 1px solid #ddd;">No Photo</div>
            @endif
        </div>

        <div class="details">
            <h3>{{ $candidate->name_en }}</h3>
            <h4 style="color: black"><b>Exam Year: {{ $candidate->batch_passing_year }}</b></h4>
            <h4 style="color: black"><b>Alumni ID: </span> {{ str_pad($candidate->id, 5, '0', STR_PAD_LEFT) }}</b></h4>
        </div>

        <div class="footer">
            Generated on {{ date('d M, Y') }} | Valid for Reunion Event Only
        </div>
    </div>
</body>
</html>
