<!DOCTYPE html>
<html>

<head>
    <title>Cetak PDF</title>
</head>

<body>
    <iframe src="{{ url('/print-dialog/' . $slug) }}" style="display:none;" id="pdfFrame"></iframe>
    <script>
        window.onload = function() {
            setTimeout(function() {
                window.print();
            }, 1000); // Tunggu 1 detik sebelum memicu dialog cetak
        };
    </script>
</body>

</html>
