<?php
class Subs extends DB
{
    
    function getSubs()
    {
        $query = "SELECT * FROM subs";
        return $this->execute($query);
    }
    
    // tampil berdasarkan id
    function getSubsById($id)
    {
        $query = "SELECT * FROM subs where id_subs=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['platform'];
        $query = "insert into subs values ('','$name')";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "delete FROM subs WHERE id_subs = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }


}




?>