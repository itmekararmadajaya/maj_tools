<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print QR Security Patroli</title>

    <style>
        /* Reset dan general layout */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 20mm;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .a4 {
            width: 210mm;
            min-height: 297mm;
            padding: 5mm;
            margin: auto;
            background: white;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        /* Cetak */
        @media print {
            body {
                background: none;
                padding: 0;
            }

            .a4 {
                margin: 0;
                box-shadow: none;
                page-break-after: always;
            }

            @page {
                size: A4;
                margin: 0mm;
            }
        }
    </style>
</head>
<body>
    <div class="a4">
        <div id="container" style="border: black 2px solid; width: 80%;">
            <div id="header" style="border-bottom: black 2px solid; padding: 10px;">
                <div>
                    <img src="{{asset('asset/logo/logona2.png')}}" alt="New Armada" style="width: 30%;">
                </div>
                <div style="text-align: center; margin-top: 15px; margin-bottom: 25px;">
                    <span style="font-weight: bold; font-size: 28px;">CHECK POINT</span>
                    <br>
                    <span style="font-weight: bold; font-size: 28px;">PATROLI SATPAM</span>
                </div>
            </div>
            <div id="body" style="padding: 25px 10px;">
                <table style="font-weight: bold; font-size: 24px;">
                    <tr>
                        <td>POS</td>
                        <td style="padding: 5px 5px;">:</td>
                        <td>{{$final_data['location'].' - '.$final_data['object_name']}}</td>
                    </tr>
                    <tr>
                        <td>LOKASI</td>
                        <td style="padding: 5px 5px;">:</td>
                        <td>{{$final_data['ttk_ptrl'].' - '.$final_data['keterangan']}}</td>
                    </tr>
                </table>
                <div style="margin-top: 15px; text-align: center;">
                    <img src="{{$qr_code}}" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function () {
            window.print();
        });
    </script>
    
</body>
</html>