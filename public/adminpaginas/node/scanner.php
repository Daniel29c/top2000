
<html>
<head>
    <?php require_once "../../../private/components/head.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scanner</title>
    <script src="./node_modules/html5-qrcode/html5-qrcode.min.js"></script>
    <Style>
        main {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #reader {
            width: 600px;
        }
        #result {
            text-align: center;
            font-size: 1.5rem;
        }
    </Style>
</head>
<body>
    <main>
        <div id="reader"></div>
        <div id="result"></div>
        <a class="btn btn-warning" href="../../adminpaginas/user_admin.php">Terug</a>
    </main>
    
    <script>
        const scanner = new Html5QrcodeScanner('reader', {
            qrbox:{
                width: 250,
                height: 250
            },
            fps: 20,

        });
        scanner.render(success, error);

        function success(result){
            document.getElementById("result").innerHTML = `
                <h2>Success!</h2>
                <p><a href="${result}">${result}</a></p>
            `;
            scanner.clear();
            // document.getElementById("reader").remove();
            window.location.href = result;
        }
        function error(err){
            console.error(err)
        }
    </script>

</body>
</html>