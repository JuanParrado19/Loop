<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $imagene =[
        "nombre"=>$_POST["file"]

    ];
    $imagenes =[];

    $imagenes[] = $imagene;


}
if(isset($_FILES['file'])){
    $file = $_FILES['file'];
    $filename = $file['name'];
    $mimetype = $file{'type'};

    if (!is_dir("media")){
        nkdir("media",0777);
    }

    move_uploaded_file($file['tmp_name'],'media/'.$filename);

}




