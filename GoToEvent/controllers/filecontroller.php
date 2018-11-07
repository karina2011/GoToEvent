<?php
namespace controllers;

use models\File as M_File;

/**
 *
 */
class FileController
{
  private $uploadFilePath;
  private $allowedExtensions;
  private $maxSize;

  function __construct()
  {
    $this->allowedExtensions = array('png', 'jpg', 'gif');
    $this->maxSize = 5000000;
    $this->uploadFilePath = IMG_UPLOADS;
  }

  public function getAllowedExtensions()
  {
     return $this->allowedExtensions;
  }

  public function getMaxSize()
  {
         return $this->maxSize;
  }

  public function upload($value='', $tipo='')
  {
      echo "<pre>";
      var_dump($value);
      echo "</pre>";
      $fileAvatar = new M_File('', $tipo, $value[$tipo]['name'], $value[$tipo]['tmp_name'], $value[$tipo]['size']);

      $filePath = $this->uploadFilePath . "/$tipo/";

      // Si no existe el directorio, lo crea.
      if(!file_exists($filePath))
           mkdir($filePath);

      $fileName = $fileAvatar->getValue();

      $fileLocation = $filePath . $fileName;	// ruta completa y archivo.

      //Obtenemos la extensión del archivo. No sirve para comprobar el verdadero tipo del archivo
      $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

      if(in_array($fileExtension, $this->allowedExtensions) )
      {
         if(!file_exists($fileLocation))
         {
              if($fileAvatar->getSize() < $this->maxSize)
              { //Menor a 5 MB

                   if (move_uploaded_file( $fileAvatar->getTempName(), $fileLocation))
                   {	//guarda el archivo subido en el directorio 'images/' tomando true si lo subio, y false si no lo hizo

                              //$alerta = 'el archivo '. $nombreArchivo .' fue subido correctamente.';
                          return true;
                   } else {
                     echo "Ocurrio un error al intentar guardar el archivo";
                   }
              } else {
                echo "Tamaño del archivo superior al permitido";
              }
          }
        } else {
          echo "La extension del archivo no es valido";
        }
        return false;
  }
}
