<?php

namespace app\Models;

class Contact extends Model
{
    protected string $table = 'contacts';
    // En general, podemos sobrescribir las propiedades de la clase base "Model"
    // por si se da el caso de que modelo derivado necesite conectarse a una DB
    // diferente, es decir, sobrescribir estas propiedades relativas a las 
    // credenciales de la base de datos:
    // protected string $db_user = ANOTHER_VALUE;
    // protected string $db_host = ANOTHER_VALUE;
    // protected string $db_pass = ANOTHER_VALUE;
    // protected string $db_name = ANOTHER_VALUE;
}
