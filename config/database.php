<?php

// En Linux, usando Docker, no puede ser 'localhost', si no '127.0.0.1'
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', 'my-secret-pw');
define('DB_NAME', 'mvcdb');
