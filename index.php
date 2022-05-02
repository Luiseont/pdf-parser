<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPF Parser</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-8 mt-4">
                <p class="h4">Parser de PDF to EXCEL</p>
                <form action="process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="file">Archivo</label>
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Procesar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>