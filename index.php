<?php
$fotos = array();
$bol = false;

if (file_exists("contacts.json")){
    $fotos = json_decode(file_get_contents("contacts.json"));
}else{
    $fotos=[];
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $bol = true;
    if(isset($_FILES['file'])){
        $file = $_FILES['file'];
        $filename = $file['name'];
        $mimetype = $file['type'];

        if (!is_dir("media")){
            nkdir("media",0777);
        }

        move_uploaded_file($file['tmp_name'],'media/'.$filename);
    }

    $fotos[] = $filename;

    file_put_contents("contacts.json",json_encode($fotos));

}else{
    $bol =false;
}


if (!$bol){
    $str = '- Toma tu primer Loop - ';

}else{
    $str = 'Ya tomaste tu primer Loop';
    $bol = false;
}





?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop</title>

    <link rel="stylesheet" href="css/Stylesheet.css">
</head>
<body>

    <header>
        <h1> - Loop - </h1>
    </header>

<section id="seccion-Contenido">
    <div id="Contenido">
        <h2 class="captura"><?= $str?></h2>

            <div id="contenido-btn">
                <form action="index.php" method="post" enctype="multipart/form-data" id="formulario">
                    <input class="boton_camara" type="file" name="file" />
                    <input class= "boton_camara" type="submit" name="upload" value="Upload"/>
                </form>

            </div>
        <script src="js/main.js"></script>

    </div>
</section>
<section id="fotos">
        <div>
            <h1>- FOTOS RECIENTES -</h1>
        </div>
        <?php foreach($fotos as $filename): ?>
        <div id="contenido fotos">
            <img class="imagenes" src="media/<?= $filename?>" alt="">
        </div>
        <?php endforeach ?>
</section>

</body>
</html>
