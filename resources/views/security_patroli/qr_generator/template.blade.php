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
            position: relative; /* penting agar ::before mengacu ke elemen ini */
            width: 210mm;
            min-height: 297mm;
            padding: 5mm;
            margin: auto;
            background: white;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            overflow: hidden; /* jika perlu, untuk mencegah background keluar */
        }

        .background-with-opacity::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: url('/asset/logo/LOGO_SATPAM.png');
            background-repeat: no-repeat;
            background-position: center center; /* memastikan posisi di tengah */
            background-size: contain;
            z-index: 0;
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

            .background-with-opacity::before {
                content: "";
                position: absolute;
                inset: 0;
                background-image: url('/asset/logo/LOGO_SATPAM.png');
                background-repeat: no-repeat;
                background-position: center;
                background-size: contain;
                z-index: 0;
            }

            @page {
                size: A4;
                margin: 0mm;
            }

            /* Ini penting agar browser mencoba mencetak background */
            * {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>

</head>
<body>
    <div id="parent" class="a4 background-with-opacity">
        <div id="container" style="border: black 2px solid; width: 50%; position: relative; background-color: white; margin: 0 auto; margin-top: 300px;">
            <div id="header" style="border-bottom: black 2px solid; padding: 10px;">
                <div>
                    <img src="{{asset('asset/logo/logona2.png')}}" alt="New Armada" style="width: 25%;">
                </div>
                <div style="text-align: center; margin-top: 5px; margin-bottom: 5px;">
                    <span style="font-weight: bold; font-size: 18px;">CHECK POINT</span>
                    <br>
                    <span style="font-weight: bold; font-size: 18px;">PATROLI SATPAM</span>
                </div>
            </div>
            <div id="body" style="padding: 10px 10px; position: relative;">
                <table style="font-weight: bold; font-size: 14px;">
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
                    <img src="{{$qr_code}}" alt="" srcset="" style="width: 200px; height: 200px;">
                </div>
            </div>
        </div>
    </div>
@if ($type == 'pdf')
    <script>
        window.addEventListener('load', function () {
            window.print();
        });
    </script>
@elseif ($type == 'image')
    <script>
        const posName = @json($pos);
        document.addEventListener("DOMContentLoaded", function () {
            const element = document.getElementById("parent");

            html2canvas(element, {
                useCORS: true,
                scale: 2
            }).then(canvas => {
                const link = document.createElement('a');
                link.download = posName+'.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
            });
        });
    </script>
@endif
    
</body>
</html>