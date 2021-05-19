<!-- model -->
<?php
// pdo database class. give us the connection, and create prepared statements, bind values, return rows/results
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $dbName = DB_NAME;

    private $dbHandler;
    private $stmt;
    private $error;

    public function __construct()
    {
        // set the dsn
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // pdo instance
        try {
            $this->dbHandler = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $error) {
            $this->error = $error->getMessage();
            echo $this->error;
        }
    }

    // prepare statements w/ query
    public function query($sql)
    {
        $this->stmt = $this->dbHandler->prepare($sql);
    }

    // bind values 
    public function binder($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value): {
                        return $type = PDO::PARAM_INT;
                    }
                case is_bool($value): {
                        return $type = PDO::PARAM_BOOL;
                    }
                case is_null($value): {
                        return $type = PDO::PARAM_NULL;
                    }
                default:
                    return $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    //execute the prepared statement
    public function executor()
    {
        return $this->stmt->execute();
    }

    //get results set as array of obj
    public function getResultSet()
    {
        $this->executor();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // get single record as obj
    public function getSingleResultSet()
    {
        $this->executor();
        return $this->stmt->fetch();
    }

    //get row count
    public function getRowCount()
    {
        return $this->stmt->rowCount();
    }
}
