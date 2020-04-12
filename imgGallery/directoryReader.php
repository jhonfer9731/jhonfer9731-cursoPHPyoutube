
<?php


function directoryReader($directory, array $excludeFiles=['.','..','.DS_Store']){

    if(!is_dir($directory)){ // si el directorio no existe
        return null;
    }

    if(!$filesDirectory = opendir($directory)){ // si el directorio no se puede abrir por alguna razon
        return null;
    }
    $files= [];
    while (($file = readdir( $filesDirectory)) !== false){
        
        if(in_array($file,$excludeFiles)) // no toma en cuenta los archivos que se quiere excluir
        {
            continue;
        }
        $files[] = $directory.'/'.$file; // se generan las rutas de los archivos encontrados en el directorio

    }

    closedir($filesDirectory);
    return $files;

}