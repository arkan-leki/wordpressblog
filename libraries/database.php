<?php

class Database
{
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $name = DB_NAME;

    public $link;
    public $error;

    public function __construct()
    {
        $this->connect();
    }

    /**
     *connect
     */
    private function connect()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->name);

        if (!$this->link) {
            $this->error = "Connection Failed: " . $this->link->connect_error;
            return false;
        }
    }

    /**
     *select
     * @param $query
     * @return bool
     */
    public function select($query)
    {
        $result = $this->link->query($query) or die($this->link->error . __LINE__);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public $host = DB_HOST;

    /**
     *insert
     * @param $query
     */
    public function insert($query)
    {
        $insert_row = $this->link->query($query) or die($this->link->error . __LINE__);

        if ($insert_row) {
//             header("Location: index.php?msg=" . urldecode('Record Added'));
            echo("<script>location.href = 'index.php?msg=" . urldecode('Record added') . "';</script>");


        } else {
            die('Error : (' . $this->link->errno . ')' . $this->link->error);
        }
    }

    /**
     *update
     * @param $query
     */
    public function update($query)
    {
        $update_row = $this->link->query($query) or die($this->link->error . __LINE__);

        if ($update_row) {
            echo("<script>location.href = 'index.php?msg=" . urldecode('Record updated') . "';</script>");
        } else {
            die("Error : (" . $this->link->errno . ")" . $this->link->error);
        }
    }

    /**
     *delete
     * @param $query
     */
    public function delete($query)
    {
        $delete_row = $this->link->query($query) or die($this->link->error . __LINE__);

        if ($delete_row) {
//            header("Location: index.php?msg=" . urldecode('Record Deleted'));
            echo("<script>location.href = 'index.php?msg=" . urldecode('Record Deleted') . "';</script>");

        } else {
            die("Error : (" . $this->link->errno . ")" . $this->link->error);
        }
    }
}

