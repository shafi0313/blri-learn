<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>
</head>

<body>
    <style>
        body {
            font-family: 'SolaimanLipi', serif;
        }

        /* .serial_no {
            float: right;
            border: 2px solid black;
            padding: 6px 9px;
        } */
        p {
            margin-bottom: 0 !important;
        }

        .certificate_2 img {
            /* width: 80px !important; */
            margin: 10px 0;
        }
        /* .img {
            width: 98%;
        } */

        .signature {
            display: block;
        }

        .sig_left {
            width: 49%;
            float: left;
        }

        .sig_rig {
            width: 49%;
            float: right;
        }
        /* table {
            width: 130% !important;
        } */
    </style>
    @include('user.certificate.css')
    <div class="certificate">
        <div class="certificate_2" style="">
            <div class="img">
                <table>
                    <tr>
                        <td style="visibility: hidden; width: 43%"><img src="{{ asset('uploads/images/icon/mojib.jpg') }}" height="80px" style="margin: 10px 0; visibility: hidden;"></td>
                        <td style="text-align:center; width: 40%"><img src="{{ asset('uploads/images/icon/breeding_logo.png') }}" height="80px" style="margin: 10px 0;"></td>
                        <td style="text-align:right; width: 40%">
                            <div style=" width:170px; border: 2px solid black; padding: 6px 9px;">ক্রমিক নং-
                            BLRI{{ $ansSheet->course->id }}{{ user()->id }}</div>
                        </td>
                    </tr>
                </table>
                {{-- <img class="top_img_1" src="{{ asset('uploads/images/icon/mojib.jpg') }}" height="80px" style="float:left;margin: 10px 0; visibility: hidden">
                <img class="top_img_2" src="{{ asset('uploads/images/icon/breeding_logo.png') }}" height="80px" style="float:left; margin: 10px 0; display:inline-block">

                <div style="float:right; width:170px; border: 2px solid black; padding: 6px 9px;display:inline-block">ক্রমিক নং-
                    BLRI{{ $ansSheet->course->id }}{{ user()->id }}</div> --}}
                {{-- <img class="top_img_3" src="{{ asset('uploads/images/icon/bangladeshs.jpg') }}" alt="" height="80px" style="float:right; margin: 10px 0;"> --}}
                {{-- <img class="top_img_1" src="{{ asset('uploads/images/icon/mojib.jpg') }}" alt="" height="80px" style="float:left;margin: 10px 0;">
                <img src="{{ asset('uploads/images/icon/breeding_logo.png') }}" alt=""
                    height="90px" style="float:left; margin: 10px 0;"> --}}
                {{-- <div style="float:right; margin: 10px 0; width:170px; border: 2px solid black; padding: 6px 9px;">ক্রমিক নং-
                    BLRI{{ $ansSheet->course->id }}{{ user()->id }}</div> --}}

                    {{-- <img class="top_img_1" src="{{ asset('uploads/images/icon/mojib.jpg') }}" alt="" height="80px" style="float:left;margin: 10px 0;"> --}}
                {{-- <img class="top_img_2" src="{{ asset('uploads/images/icon/breeding_logo.png') }}" alt=""
                height="90px" style="float:left; margin: 10px 0;">
            <div class="" style="float:right; margin: 10px 0; width:160px">ক্রমিক নং-
                BLRI{{ $ansSheet->course->id }}{{ user()->id }}</div> --}}
            {{-- <img class="top_img_3" src="{{ asset('uploads/images/icon/bangladeshs.jpg') }}" alt="" height="80px" style="float:right; margin: 10px 0;"> --}}
            </div>
            <div class="title">বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট</div>
            <div style="padding: 0 40px">
                <p class="presented_to">সাভার, ঢাকা।</p>
                <p class="presented_to presented_to_cert">সনদপত্র</p>
                <table>
                    <tr>
                        <th class="tr">নামঃ</th>
                        <th class="tl">{{ user()->name_cer }}</th>
                    </tr>
                    <tr>
                        <th class="tr">পিতা/স্বামীর নামঃ</th>
                        <th class="tl">{{ user()->fa_name }}</th>
                    </tr>
                    <tr>
                        <th class="tr">ঠিকানাঃ</th>
                        <th class="tl">{{ user()->text }}</th>
                    </tr>
                </table>
                <p class="course">
                    বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট এর উদ্যোগে
                    {{ monthInBangla(carbon($ansSheet->updated_at)->format('n')) }},
                    {{ digitInBangla(carbon($ansSheet->updated_at)->format('Y')) }} খ্রিঃ মেয়াদে অনুষ্ঠিত
                    “{{ $ansSheet->course->name }}”
                    শীর্ষক প্রশিক্ষণ কোর্স সাফল্যের সহিত সম্পন্ন করিয়াছেন।
                    <br>আমি তার উত্তোরোত্তর সমৃদ্ধি কামনা করছি।
                </p>
            </div>
            <div class="signature">
                <div class="sig_left">
                    <img src="{{ asset('uploads/images/signature/' . $signatures->where('id', 1)->first()->image) }}"
                        alt="" height="50px">
                    <p>{{ $signatures->where('id', 1)->first()->name }}</p>
                    <p>{{ $signatures->where('id', 1)->first()->designation }}</p>
                </div>
                <div class="sig_rig">
                    <img src="{{ asset('uploads/images/signature/' . $signatures->where('id', 2)->first()->image) }}"
                        alt="" height="50px">
                    <p>{{ $signatures->where('id', 2)->first()->name }}</p>
                    <p>{{ $signatures->where('id', 2)->first()->designation }}</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
