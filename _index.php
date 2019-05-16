<?php 

$arquivo = "IMG_4278.JPG";

$width = 200;
$height = 200;


list($largura_original, $altura_original) = getimagesize($arquivo);

$ratio = $largura_original / $altura_original;

if ($width/$height > $ratio) {
	$width = $height * $ratio;
}else{
	$height = $width / $ratio;
}

// echo "L ORG: ".$largura_original." - A ORIG: ".$altura_original."<br>";

// echo "Largura: ".$width." - Altura: ".$heigt;

$imagem_final = imagecreatetruecolor($width, $height);

$imagem_original = imagecreatefromjpeg($arquivo);

imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0, $width, $height, $largura_original, $altura_original);

// Transformar o arquivo php em arquivo imagem
// header("Content-Type: image/jpeg");

// imagejpeg($imagem_final,null,100);

// Salva imagem
imagejpeg($imagem_final,"mini_imagem.jpeg");

echo "Imagem redimensionada com sucesso";
