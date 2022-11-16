<?php

    //Validacion Nombre (Que empiece por mayusculas y longitud min 3 max 20)

    function validadorNombre($nombre) {
        if (!$nombre == "") {
            if (strlen($nombre) < 3 || strlen($nombre) > 20) {
                if(ctype_upper($nombre[0]) != true) {
                    //echo "Error. El nombre tiene que tener una longitud entre 3 y 20 caracteres y la primera letra tiene que ser mayuscula. <br>";
                    return true;
                } else {
                    //echo "Error. El nombre tiene que tener una longitud entre 3 y 20 caracteres. <br>";
                    return true;
                }
                
            }elseif (ctype_upper($nombre[0]) != true) {
                //echo "Error. La primera letra del nombre tiene que ser mayuscula. <br>";
                return true;
            }else {
                //echo "El nombre indicado es correcto. <br>";
                return false;
            }
        }else{
            //echo "Error. El nombre tiene que tener una longitud entre 3 y 20 caracteres y la primera letra tiene que ser mayuscula. <br>";
            return true;
        }

        

    }

    //Validacion Apellido (Que empiece por mayusculas y longitud min 3 max 20)

    function validadorUsuario($usuario) {

    }

    function validadorApellido($apellido) {
        if (!$apellido == "") {
            if (strlen($apellido) < 3 || strlen($apellido) > 20) {
                if(ctype_upper($apellido[0]) != true) {
                    //echo "Error. El apellido tiene que tener una longitud entre 3 y 20 caracteres y la primera letra tiene que ser mayuscula. <br>";
                    return true;
                } else {
                    //echo "Error. El apellido tiene que tener una longitud entre 3 y 20 caracteres. <br>";
                    return true;
                }
                
            }elseif (ctype_upper($apellido[0]) != true) {
                //echo "Error. La primera letra del apellido tiene que ser mayuscula. <br>";
                return true;
            }else {
                //echo "El apellido indicado es correcto. <br>";
                return false;
            }
        }else {
            //echo "Error. El apellido tiene que tener una longitud entre 3 y 20 caracteres y la primera letra tiene que ser mayuscula. <br>";
            return true;
        }
        
    }

    //Validacion Email (Que contenga el @)

    function validadorEmail($email) {
        if (!str_contains($email, "@")) {
            //echo "Error. El email introducido no es un E-Mail. <br>";
            return true;
        }else {
            //echo "El email indicado es correcto. <br>";
            return false;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        
    }
?>