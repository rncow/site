<?php
namespace app\Classes;
use mysqli;

/**
 * Реализует функционал по работе с таблицами БД
 */

abstract class Models {

    /**
     * Переменная, необходимая для подключения к БД
     * @var $conn
     */

    private $conn;

    /**
     * Переменная, в которой хранится название таблицы, полученное из дочернего класса
     * @var $table
     */

    protected $table;

    private $selections;
    private $joins;
    private $where;
    private $orderBy;
    private $limit;

    public function __construct()
    {
        $this->conn = new mysqli("site", "root", "", "MyDB");
    }

    /**
     * Выборка стобцов таблицы для формирования запросов
     * @param ...$columns string столбцы таблицы
     * @return Models
     */

    function select(...$columns) : Models
    {
        $stringOfColumns = implode(', ', $columns);

        $this->selections .= $stringOfColumns;

        return $this;
    }

    /**
     * Выполняет INSERT запрос.
     * @param ...$valuesArray string|integer вставляемые значения
     * @return void
     */

    function insert(...$valuesArray)
    {
        $values = '';

        foreach ($valuesArray as $value) {
            if (gettype($value) == 'integer') {
                $values .= "$value, ";
            } else {
                $values .= "'$value', ";
            }
        }

        $values = rtrim($values,', ');

        $queryString = "INSERT INTO $this->table ($this->selections) VALUES ($values)";


        $this->conn->query($queryString);
    }


    /**
     * Выполняет UPDATE запрос.
     * При наличии части WHERE добавляет её к запросу
     * @param array $sets Набо столбцов и значений для обновления в виде ассоциативного массива
     * @return void
     */

    function update(array $sets)
    {
        $queryString = 'UPDATE ' . $this->table . ' SET ';

        foreach ($sets as $key => $value) {
            if (gettype($value) == 'integer') {
                $queryString .= $key . ' = ' . $value . ', ';;
            } else {
                $queryString .= $key . ' = \'' . $value . '\', ';;
            }
        }
        $queryString = rtrim($queryString,', ');

        if ($this->where) {
            $queryString .= $this->where;
        }

        $this->conn->query($queryString);
    }

    /**
     * Выполняет DELETE запрос.
     * При наличии части WHERE добавляет её к запросу
     * @return string
     */

    function delete()
    {
        $queryString = 'DELETE FROM ' . $this->table;

        if ($this->where) {
            $queryString .= $this->where;
        }

        $this->conn->query($queryString);
    }

    /**
     * Реализует WHERE-часть для sql-запроса.
     * @return Models
     */

    function where(string $where) : Models
    {
        $this->where .= ' WHERE ' . $where;

        return $this;
    }

    /**
     * Реализует JOIN часть для sql-запроса
     * @param string $secondTable Название второй таблицы
     * @param string $secondTableKey Ключ второй таблицы
     * @param string $tableKey Ключ первой (изначальной) таблицы
     * @param string|null $joinType Тип присоединения (LEFT, RIGHT, INNER). По умолчанию INNER
     * @return $this
     */

    function join(string $secondTable, string $secondTableKey, string $tableKey, string $joinType = null) : Models
    {
        $this->joins .= ($joinType ? ' ' . $joinType : '') . ' JOIN ' . $secondTable . ' ON '
            . $secondTable . '.' . $secondTableKey . ' = ' . $this->table . '.' . $tableKey;

        return $this;
    }

    /**
     * Реализует ORDER BY-часть для sql-запроса.
     *
     * @return void
     */

    function orderBy(string $order) : Models
    {
        $this->orderBy .= ' ORDER BY ' . $order;

        return $this;
    }

    function limit(int $offset, int $row_count)
    {
        $this->limit .= ' LIMIT ' . $offset . ', ' . $row_count;

        return $this;
    }

    /**
     * Формирует SELECT запрос из частей.
     * Возвращает результат запроса в виде ассоциативного массива
     * @return array
     */

    function get(): array
    {
        $queryString = 'SELECT ' . $this->selections . ' FROM ' . $this->table;

        if ($this->joins) {
            $queryString .= $this->joins;
        }

        if ($this->where) {
            $queryString .= $this->where;
        }

        if ($this->orderBy) {
            $queryString .= $this->orderBy;
        }

        if ($this->limit) {
            $queryString .= $this->limit;
        }

        $sqlData = $this->conn->query($queryString);

        $resultData = [];

        while ($row = $sqlData->fetch_array(MYSQLI_ASSOC)) {
            $resultData[] = $row;
        }

        return $resultData;
    }
}