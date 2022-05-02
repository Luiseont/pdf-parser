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
                <?php
                    include 'vendor/autoload.php';
                    $file = $_FILES;
                    $uploadPath = __DIR__.'/uploads/';
                    $allow_types = array('pdf'); 

                    if($file['file']['error'])
                    {
                        throw new Exception("Error al subir el archivo", 1);
                    }

                    if(in_array(pathinfo($file['file']['name'], PATHINFO_EXTENSION), $allow_types))
                    {
                        $filename =  time() . '_' . basename($file['file']['name']);

                        if(move_uploaded_file($file['file']['tmp_name'], "$uploadPath/$filename")){
                            $parser = new \Smalot\PdfParser\Parser();
                            $pdf    = $parser->parseFile("$uploadPath/$filename");
                            
                            // Retrieve all pages from the pdf file.
                            $pages  = $pdf->getPages();

                            // Loop over each page to extract text.
                            foreach ($pages as $page) {
                                echo $page->getText().PHP_EOL;
                            }

                        }else{
                            throw new Exception("Error al subir el archivo", 1);
                        }

                    }else{
                        throw new Exception("Formato no valido", 1);
                    }
                
                ?>
            </div>
        </div>
    </div>
</body>
</html>