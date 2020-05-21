<?php

/**
 * Class DataBase
 * Obsługa bazy danych
 */
class DataBase
{

    /**
     * @var PDO Połączenie z bazą danych
     */
    private $db;
    /**
     * @var
     */
    private $stmt;

    /**
     * DataBase constructor.
     */
    public function __construct()
    {
        $configDB = require_once 'DataBaseConfig.php';
        try {
            $this->db = new PDO("mysql:host={$configDB['host']};dbname={$configDB['database']};charset=utf8", $configDB['user'], $configDB['password'],
                [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        } catch (PDOException $error) {
            echo $error;
            exit('Database Error');
        }
    }

    /**
     * @param $query
     */
    public function query($query)
    {
        $this->stmt = $this->db->prepare($query);
    }

    /**
     * @return mixed
     */
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    /**
     * @return mixed
     */
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     */
    public function resultset()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $param
     * @param $value
     * @param null $type
     */
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        return $this->stmt->execute();
    }
}