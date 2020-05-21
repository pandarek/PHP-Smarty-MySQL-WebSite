<?php
require_once 'DataBase.php';

/**
 * Class Articles
 */
class Articles
{
    /**
     * @var mixed
     */
    public $id;
    /**
     * @var mixed
     */
    public $publishDate;
    /**
     * @var mixed
     */
    public $title;
    /**
     * @var mixed
     */
    public $intro;
    /**
     * @var mixed
     */
    public $content;

    /**
     * Articles constructor.
     * @param $data
     */
    public function __construct($data)
    {
        if (isset($data['id'])) $this->id = $data['id'];
        if (isset($data['publishDate'])) $this->publishDate = $data['publishDate'];
        if (isset($data['title'])) $this->title = $data['title'];
        if (isset($data['intro'])) $this->intro = $data['intro'];
        if (isset($data['content'])) $this->content = $data['content'];
    }

    /**
     * Pobiera pojedyńczy artukuł
     * @param $id int ID aktykułu
     * @return array
     */
    public static function getById($id)
    {
        $db = new DataBase();
        $db->query("SELECT * , UNIX_TIMESTAMP(publishDate) AS publishDate FROM articles WHERE id = :id");
        $db->bind(':id', $id);
        $row = $db->single();
        $db = null;
        if ($row) return new Articles($row);
    }

    /**
     * Pobiela listę dostępnych artykułow
     * @param int $numRows Liość pobranych artykułów
     * @param string $order Sortowanie
     * @return array
     */
    public static function getList($numRows = 1000000, $order = "publishDate DESC")
    {
        $db = new DataBase();
        $db->query("SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(publishDate) AS publishDate FROM articles
            ORDER BY " . $order . " LIMIT " . $numRows);
        $rows = $db->resultset();

        $db = null;
        return $rows;
    }
}