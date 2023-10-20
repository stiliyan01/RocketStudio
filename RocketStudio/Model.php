<?php


class Model
{
    private static $conn;


    public static function setConnection($connection)
    {
        self::$conn = $connection;
    }

    public static function all($table)
    {
        $sql = "SELECT * FROM $table";
        $result = self::$conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return null;
        }
    }
    public static function getRecordsByDetails($first_name, $middle_name, $sure_name, $date_of_birth)
    {
        $query = "SELECT * FROM users WHERE first_name = ? AND middle_name = ? and sure_name = ? AND date_of_birth = ?";

        $stmt = self::$conn->prepare($query);
        $stmt->bind_param("ssss", $first_name, $middle_name, $sure_name, $date_of_birth);

        $stmt->execute();

        $result = $stmt->get_result();
        $records = array();

        while ($row = $result->fetch_assoc()) {
            $records[] = $row;
        }

        return $records;
    }

    public static function getAllRecordsSorted($start_date, $end_date = null)
    {
        if ($end_date === null) {
            $end_date = date('Y-m-d');
        }
        $query = "SELECT users.first_name, users.middle_name, users.sure_name, users.date_of_birth, university.university_name, technologies.technology_name
        FROM users
        INNER JOIN university ON users.university_id = university.id
        INNER JOIN technologies ON users.technology_id = technologies.id
        WHERE date_of_birth BETWEEN '$start_date' AND '$end_date';";

        $result = self::$conn->query($query);
        $records = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
            return $records;
        }
    }
    public static function getAllRecords()
    {
        $query = "SELECT users.first_name, users.middle_name, users.sure_name, users.date_of_birth, university.university_name, technologies.technology_name
        FROM users
        INNER JOIN university ON users.university_id = university.id
        INNER JOIN technologies ON users.technology_id = technologies.id";

        $result = self::$conn->query($query);
        $records = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
            return $records;
        }
    }
    public static function insert($table, $columns = [], $values = [])
    {
        $columns = implode(', ', $columns);
        $values = implode("', '", $values);
        $sql = "INSERT INTO $table ($columns) VALUES ('$values')";
        self::$conn->query($sql);
    }

    public static function find($table, $column, $searchValue)
    {
        $sql = "SELECT id, $column FROM $table WHERE $column = '$searchValue'";
        $result = self::$conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return null;
        }
    }
}


$database = new mysqli("localhost", "stiliyan", "1234", "rocketstudio");
Model::setConnection($database);
