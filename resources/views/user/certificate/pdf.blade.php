<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        @font-face {
            font-family: 'SolaimanLipi';
            src: url("{{ asset('backend/fonts/Nikosh.ttf') }}") format('truetype');
        }
        body{
            font-family: 'SolaimanLipi', serif;
        }
        p{
            margin-bottom: 0 !important;
        }
    </style>
    @include('user.certificate.css')
    <div class="certificate">
        <div class="certificate_2">
            <div class="img">
                <img src="{{ asset('uploads/images/icon/blri_learning_logo.png') }}" alt="">
            </div>
            <div class="title">CERTIFICATE OF COMPLETION</div>
            <div style="padding: 0 40px">
                <p class="presented_to">This certificate is proudly presented to</p>
                <p class="student">{{ auth()->user()->name_cer }}</p>
                <p class="course">To commemorate her successful completion of {{ $ansSheet->course->name }} on BLRI e-Learning platform</p>
                <img src="{{ asset('uploads/images/icon/breeding_logo.png') }}" width="80px"><br>
                <p class="signature">name</p>
                <p class="signature_deg">Chief Executive Officer (CEO)</p>
            </div>
        </div>
    </div>

</body>
</html>

