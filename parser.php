<?php

//Initializing the element analyzer
$parser = xml_parser_create();

//Prints XML elements in HTML format
function start($parser, $elemento, $atributo){
    echo '<body bgcolor="#eeeeee" style="";>';

    switch($elemento){
        case "PROYECTO":
            echo '<h1 style="border:4px solid black";>Proyecto</h1>';
            break;
        case "NOMBRE":
            echo '<h2 style="color:#284263";>Nombre: </h2>';
            break;
        case "IDENTIFICADOR":
            echo '<h3 style="color:#420303";>Identificador: ';
            break;
        case "DESCRIPCION":
            echo '<h3 style="color:#420303";>Descripción: ';
            break;
        case "AUTOR":
            echo '<h2 style="color:#284263";>Autor: </h2>';
            break;
        case "FECHA":
            echo '<h3 style="color:#420303";>Fecha: ';
            break;
        case "IDPROYECTOS":
            echo '<h3 style="color:#420303";>Id Proyectos: ';
            break;
        case "CARACTERISTICAS":
            echo '<h2 style="color:#284263";>Características: </h2>';
            break;
        case "VERSION":
            echo '<h2 style="color:#284263";>Versión: </h2>';
            break;
        case "IDVERSION":
            echo '<h3 style="color:#420303";>Id Versión: ';
            break;
        case "URL":
            echo '<h3 style="color:#420303";>URL: ';
            break;
        case "CATEGORIA":
            echo '<h2 style="color:#284263";>Categoría: </h2>';
            break;
        case "PALABRAS":
            echo '<h3 style="color:#4a430d";>Palabras: ';
            break;
        case "LICENCIA":
            echo '<h2 style="color:#284263";>Licencia: </h2>';
            break;
        case "FICHEROS":
            echo '<h2 style="color:#284263";>Ficheros: </h2>';
            break;
        case "DESCARGAS":
            echo '<h2 style="color:#284263";>Descargas: ';
            break;
    }
    
        if(count($atributo)){
            foreach($atributo as $k => $v){
                echo "<font color=\"#009900\">$k</font>=\"
               <font color=\"#990000\">$v</font>\"";                                   
            }
        
        }
       echo '</body>';
}



//Function used to finish each element
function stop($parser, $elemento){
    echo "<br>";
}

function char($parser, $data){
    echo $data;
}


//Elements handler
xml_set_element_handler($parser, "start", "stop");

//Data handler
xml_set_character_data_handler($parser, "char");

//XML document
$documento = fopen("proyecto.xml","r");
if(!$documento = fopen("proyecto.xml", "r")){
    echo "El documento no se ha podido abrir.";
}

//Data reader
while($data = fread($documento, 4096)){
    xml_parse($parser, $data, feof($documento)) or
    die (sprintf("Error XML: %s en la línea %d", xml_error_string(xml_get_error_code($parser)),
    xml_get_current_line_number($parser)));
}

//Finalizing the analyzer
xml_parser_free($parser);


?>