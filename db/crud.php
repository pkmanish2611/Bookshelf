<?php
class crud{
    private $db;

    function __construct($connection){
        $this->db = $connection;

    }
    public function getBookDetail($id){
        $sql= "SELECT * FROM `bookshelf` WHERE bId = id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
         

    }
        

}



?>