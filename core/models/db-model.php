<?php
class DbModel extends BaseModel {

    public function getAll()
    {
        $sql = "select * from $this->table";
        return $this->raw($sql);
    }
    public function getById($id){
        $sql = "select * from $this->table where id=$id";
        return $this->raw($sql);
    }
}
?>