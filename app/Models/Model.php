<?php

namespace app\Models;

use mysqli;
use mysqli_result;

class Model
{
    protected string $db_host = DB_HOST;
    protected string $db_user = DB_USER;
    protected string $db_pass = DB_PASS;
    protected string $db_name = DB_NAME;

    // Para una conexión a Mysql/MariaDB no es necesario especificar
    // el charset ni el puerto siempre que éste sea el puerto por default,
    // es decir, el 3306.
    /* protected string $charset = 'utf8mb4';
    protected string $db_port = '3306'; */

    protected mysqli $connection;
    protected mysqli_result | bool $query;

    // Esta propiedad será sobrescrita en cada clase derivada
    protected string $table;

    public function __construct()
    {
        try {
            $this->connection();
        } catch (\Throwable $e) {
            die('DB connection error: ' . $e->getMessage());
        }
    }

    // Establecer la conexión con la DB
    public function connection(): void
    {
        $this->connection = new mysqli(
            $this->db_host,
            $this->db_user,
            $this->db_pass,
            $this->db_name
        );

        // Si se ha producido un error durante la instaciación del
        // objeto mysqli no se podrá accesar $this->connection y, por
        // lo tanto, tampoco su propiedad connect_error.
        // Es mejor capturar la excepción en el mismo constructor
        // mediante un try/catch, cancelando la ejecución con die.
        /* if ($this->connection->connect_error) {
            die('DB connection error: ' . $this->connection->connect_error);
        } */
    }

    public function query(string $stmt): self
    {
        // Si la consulta SQL no tiene parámetros, podemos usar
        // el método query directamente.
        // Con fetch_assoc() sólo nos trae el primer registro que
        // coincida con la consulta; fetch_all(MYSQLI_ASSOC) nos trae
        // un array asociativo con todos los resultados de la consulta.
        // Almacenamos el mysqli_result en la propiedad $query
        $this->query = $this->connection->query($stmt);

        // Retornando $this podemos encadenar métodos
        return $this;
    }

    public function first(): array | false | null
    {
        return $this->query->fetch_assoc();
    }

    public function get(): array
    {
        return $this->query->fetch_all(MYSQLI_ASSOC);
    }

    /* Standard Queries */

    public function all(): array
    {
        $stmt = "SELECT * FROM {$this->table}";

        return $this->query($stmt)->get();
    }

    public function find(int $id): array | false | null
    {
        $stmt = "SELECT * FROM {$this->table} WHERE id = {$id}";

        return $this->query($stmt)->first();
    }
    /* 
    public function where(
        string $column,
        mixed $operator,
        mixed $value = null // default value
    ): self {

        // Con esta estrategia permitimos que le podamos pasar a where()
        // 1 o 2 parámetros
        if ($value === null) {
            $value = $operator;
            $operator = '=';
        }

        // El objeto msyli posee un método para escapar las comillas simples
        $value = $this->connection->real_escape_string($value);

        // SELECT * FROM contacts WHERE name = 'Enrique Marín'
        $stmt = "SELECT * FROM {$this->table} WHERE {$column} {$operator} '{$value}'";

        // Si un usuario malicioso crea una inyección SQL como ésta:
        // SELECT * FROM contacts WHERE name = 'Escalador' OR 'a' = 'a';
        // con la parte [OR 'a' = 'a'] se cumpliría el filtro en cualquier caso
        // (VER: https://youtu.be/zP3slK3wCak?si=CoVSJ7i7-Fx2nFFz&t=198), luego
        // la sentencia SQL que se ejecutaría sería [SELECT * FROM contacts], 
        // es decir, que devolvería todo el contenido de la tabla.😱😱
        // La forma de evitarlo es esecialmente escapar las comillas simples
        // con el método real_escape_string() del objeto msqli. Entonces la
        // statement se transforma en esto:
        // SELECT * FROM contacts WHERE name = 'Soy un Hacker\' OR \'a\' = \'a',
        // es decir buscará "Soy un Hacker\' OR \'a\' = \'a", es decir,
        // un registro que no existe en la DB, devolviendo un array vacío ("[]")
        // return $stmt;

        // Para hacerlo más flexible sólo hacemos la consulta;
        // luego podemos elegir entre usar first() o get()
        $this->query($stmt);

        return $this;
    } */

    public function create(array $data): array
    {
        // "INSERT INTO contacts (name, email, phone) VALUES ('', '', '')"
        // Los values tienen que ir entre comillas simples porque pueden ser
        // strings que contengan espacios
        $columns = array_keys($data);
        $columns = implode(', ', $columns);

        $values = array_values($data);
        $values = "'" . implode("', '", $values) . "'";

        $stmt = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";

        $this->query($stmt);

        $insert_id = $this->connection->insert_id;

        return $this->find($insert_id);
    }

    public function update(int $id, array $data): array
    {
        // "UPDATE contacts SET name = '', email = '', phone = '' WHERE id = 1";
        $fields = [];

        foreach ($data as $key => $value) {
            $fields[] = "{$key} = '{$value}'";
        }

        $fields = implode(', ', $fields);

        $stmt = "UPDATE {$this->table} SET {$fields} WHERE id = {$id}";

        $this->query($stmt);

        return $this->find($id);
    }

    public function delete(int $id): void
    {
        // "DELETE FROM contacts WHERE id = 1";
        $stmt = "DELETE FROM {$this->table} WHERE id = {$id}";

        $this->query($stmt);
    }

    /* Prepared Queries */

    public function where(
        string $column,
        mixed $operator,
        mixed $value = null // default value
    ): self {

        // Con esta estrategia permitimos que le podamos pasar a where()
        // 1 o 2 parámetros
        if ($value === null) {
            $value = $operator;
            $operator = '=';
        }

        // "SELECT * FROM contacts WHERE name = ?"; // ? => placeholder
        $sql = "SELECT * FROM {$this->table} WHERE {$column} {$operator} ?";

        // prepared statement
        $stmt = $this->connection->prepare($sql);

        // El primer parámetro de bind_params() hace referencia al tipo/tipos
        // del valor/es que estamos pasando: 's' => string, 'i' => interger,
        // 'f' => float, etc.
        $stmt->bind_param('s', $value);
        // Si hubiera 2 o más parámetros se haría así:
        // $stmt->bind_param('ssi', $value1, $value2, $value3);
        // Querría decir: string, string, integer

        // Finalmente, ejecutamos la sentencia
        $stmt->execute();

        // Almacenamos el resultado la consulta ($result = $stmt->get_result())
        $this->query = $stmt->get_result();

        return $this;
    }
}
