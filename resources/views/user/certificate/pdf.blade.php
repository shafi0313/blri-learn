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
        body{
            font-family: 'SolaimanLipi', serif;
        }
        p{
            margin-bottom: 0 !important;
        }
        .certificate_2 img {
            width: 80px !important;
            margin: 10px 0;
        }
        .signature {
            display: block;
        }

        .sig_left {
            width:49%;
            float: left;
        }

        .sig_rig {
            width:49%;
            float: right;
        }

    </style>
    @include('user.certificate.css')
    <div class="certificate">
        <div class="certificate_2" style="">
            <div class="img">
                <img class="top_img_1" src="{{ asset('uploads/images/icon/mojib.jpg') }}" alt="" height="80px" style="float:left;margin: 10px 0;">
                <img class="top_img_2" src="{{ asset('uploads/images/icon/breeding_logo.png') }}" alt="" height="80px" style="float:left; margin: 10px 0;">
                <img class="top_img_3" src="{{ asset('uploads/images/icon/bangladeshs.jpg') }}" alt="" height="80px" style="float:right; margin: 10px 0;">
            </div>
            <div class="title">বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট</div>
            <div style="padding: 0 40px">
                <p class="presented_to">সাভার, ঢাকা।</p>
                <p class="presented_to">সনদপত্র</p>
                <p class="student">{{ auth()->user()->name_cer }}</p>
                <p class="student">{{ auth()->user()->fa_name }}</p>
                <p class="student">{{ auth()->user()->mo_name }}</p>
                <p class="student">{{ auth()->user()->text }}</p>
                <p class="course">বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট এর উদ্যোগে ২০-২২ ডিসেম্বর, ২০২১ খ্রিঃ মেয়াদে অনুষ্ঠিত “{{ $ansSheet->course->name }}” শীর্ষক প্রশিক্ষণ কোর্স সাফল্যের সহিত সম্পন্ন করিয়াছেন। <br>আমি তার উত্তোরোত্তর সমৃদ্ধি কামনা করছি</p>

            </div>
            <div class="signature">
                <div class="sig_left">
                    <img src="{{ asset('uploads/images/signature/'.$signatures->where('id',1)->first()->image) }}" alt="" height="50px">
                    <p>{{ $signatures->where('id',1)->first()->name }}</p>
                    <p>{{ $signatures->where('id',1)->first()->designation }}</p>
                </div>
                <div class="sig_rig">
                    <img src="{{ asset('uploads/images/signature/'.$signatures->where('id',2)->first()->image) }}" alt="" height="50px">
                    <p>{{ $signatures->where('id',2)->first()->name }}</p>
                    <p>{{ $signatures->where('id',2)->first()->designation }}</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

