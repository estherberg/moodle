<?php

require_once(LIB_PATH . DS . 'database.php');

class Teacher
{

    protected static $tbl_name = "teacher";

    static function instantiate($record)
    {
        $object = new self;

        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    private function has_attribute($attribute)
    {
        return array_key_exists($attribute, $this->attributes());
    }

    protected function attributes()
    {
        global $mydb;
        $attributes = array();
        foreach ($this->db_fields() as $field) {
            if (property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }

    function db_fields()
    {
        global $mydb;
        return $mydb->getFieldsOnOneTable(self::$tbl_name);
    }

    function find_all_teachers($name = "")
    {
        global $mydb;
        $mydb->setQuery("SELECT * 
							FROM  " . self::$tbl_name . " 
							WHERE  `TEACH_FULLNAME` ='{$name}'");
        $cur = $mydb->executeQuery();
        $row_count = $mydb->num_rows($cur);//get the number of count
        return $row_count;
    }

    function listOfTeachers()
    {
        global $mydb;
        $mydb->setQuery("SELECT * 
						FROM  " . self::$tbl_name);
        $cur = $mydb->loadResultList();
        return $cur;
    }

    function single_teacher($id = 0)
    {
        global $mydb;
        $mydb->setQuery("SELECT * FROM " . self::$tbl_name . " Where TEACH_ID= {$id} LIMIT 1");
        $cur = $mydb->loadSingleResult();
        return $cur;
    }

    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function update($id = 0)
    {
        global $mydb;
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = array();
        foreach ($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }
        $sql = "UPDATE " . self::$tbl_name . " SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .= " WHERE TEACH_ID=" . $id;
        $mydb->setQuery($sql);
        if (!$mydb->executeQuery()) return false;

    }

    protected function sanitized_attributes()
    {
        global $mydb;
        $clean_attributes = array();
        foreach ($this->attributes() as $key => $value) {
            $clean_attributes[$key] = $mydb->escape_value($value);
        }
        return $clean_attributes;
    }

    public function create()
    {
        global $mydb;
        $attributes = $this->sanitized_attributes();
        $sql = "INSERT INTO " . self::$tbl_name . " (";
        $sql .= join(", ", array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";
        echo $mydb->setQuery($sql);

        if ($mydb->executeQuery()) {
            $this->id = $mydb->insert_id();
            return true;
        } else {
            return false;
        }
    }

    public function delete($id = 0)
    {
        global $mydb;
        $sql = "DELETE FROM " . self::$tbl_name;
        $sql .= " WHERE TEACH_ID=" . $id;
        $sql .= " LIMIT 1 ";
        $mydb->setQuery($sql);

        if (!$mydb->executeQuery()) return false;

    }


}

?>