    <style>
        #capture {
            width: 600px;
            padding: 20px;
            border: 2px solid #333;
            background-color: #f9f9f9;
            font-family: Arial;
        }
    </style>
<div>
    <div id="capture">
        <h2>Contoh Konten</h2>
        <p>Ini adalah konten dari blade yang ingin kamu simpan sebagai gambar.</p>
    </div>

    <br>

    <button onclick="captureDiv()">Download Gambar</button>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const element = document.getElementById("capture");

            html2canvas(element, {
                useCORS: true,
                scale: 2
            }).then(canvas => {
                const link = document.createElement('a');
                link.download = 'auto-capture.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
            });
        });
    </script>
</div>