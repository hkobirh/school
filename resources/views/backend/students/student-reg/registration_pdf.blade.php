<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration pdf</title>
</head>

<style>
    .page-break {
        page-break-after: always;
    }

    /* Design for pdf*/
    * {
        margin: 0;
    }

    .container {
        max-width: 1370px;
        width: 80%;
        margin-left: 10%;
        justify-content: center;
        background: transparent;
        font-family: sans-serif;
        padding-top: 20px;
    }

    .row {
        width: 100%;
        padding: 1px;
    }

    .text-center {
        text-align: center;
    }

    .text-white {
        color: white;
    }

    .header {
        width: 100%;
        display: flex;
    }

    .school-logo {
        width: 30%;
        padding: 5px;
        text-align: left;
    }

    .school-address {
        width: 40%;
    }

    .student-photo {
        width: 30%;
        padding: 5px;
        text-align: right;
    }

    .progress-bar {
        width: 100%;
        background: transparent;
        text-align: center;
    }

    .footer {
        display: flex;
        width: 100%;
        text-align: center;
        margin-top: 30px;
    }

    .part {
        padding-top: 5px;
    }

    .part-1 {
        width: 30%;
    }

    .part-2 {
        width: 40%;
    }

    .part-3 {
        width: 30%;
    }

    .bordered {
        border: 1px solid gray;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
    table, tr, td {
        /*border: 1px solid black;*/
    }
    table {
        width: 100%;
        margin-top: 10px;
        /*border-collapse: collapse;*/
    }
</style>

<body>
<div class="container">
    {{$details['student']['image']}}
        <div class="row text-center" style="min-height: 200px">
            <div class="header">
                <div class="school-logo">
                    <img src="{{asset('uploads/students_image/'.$details['student']['image'])}}" alt="" style="max-width: 100px;">
                </div>
                <div class="school-address text-center">
                    <h2>ABC HIHG SCHOOL</h2>
                    <h4>Gouripur, Mymensingh</h4>
                    <span>AAAAAAAAA</span>
                </div>
                <div class="student-photo">
                    {{--<img src="{{asset('uploads/students_image/'.$details['student']['image'])}}" alt="" style="max-width: 100px">--}}
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="page-body">
                <div class="progress-bar">
                    <img src="" alt="" style="max-width: 50px;">
                </div>
                <div class="content">
                    <div class="text-center">
                        <h2>Registration Card</h2>
                    </div>
                    <div class="data-table">
                        <table>
                            <tr>
                                <td style="width: 30%"> Student Name</td>
                                <td> Aminul Islam</td>
                            </tr>
                            <tr>
                                <td style="width: 30%"> Father's Name</td>
                                <td> Ajgor Islam</td>
                            </tr>

                            <tr>
                                <td style="width: 30%"> Date of birth</td>
                                <td> 00-00-0000</td>
                            </tr>
                            <tr>
                                <td style="width: 30%"> Address</td>
                                <td> Nine</td>
                            </tr>
                            <tr>
                                <td style="width: 30%"> Mobile</td>
                                <td> 017-00 00 00 00</td>
                            </tr>
                        </table>


                        <table>
                            <tr>
                                <td style="width: 30%"> Subject code</td>
                                <td> 100, 110, 120, 130, 140, 150, 160</td>
                            </tr>
                            <tr>
                                <td style="width: 30%"> Education year</td>
                                <td> 2020-2021</td>
                            </tr>
                            <tr>
                                <td style="width: 30%"> Class</td>
                                <td>Nine</td>
                            </tr>
                            <tr>
                                <td style="width: 30%"> Blode group</td>
                                <td> A +</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr style="margin-top: 10px;">
        <div class="row" style="text-align: right;">
            <div class="footer">
                <div class="part part-1"></div>
                <div class="part part-2"></div>
                <div class="part part-3">Head of the institute</div>
            </div>
        </div>
</div>
</body>
</html>
