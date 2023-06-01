<?php

class Members extends DB
{
    
    function getMembers()
    {
        $query = "SELECT * FROM members INNER JOIN subs ON members.subs_id = subs.id_subs";
        return $this->execute($query);
    }
    
    // tampil berdasarkan id
    function getMembersById($id)
    {
        $query = "SELECT * FROM members where id=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $subs_id = $data['subs_id'];
        $query = "INSERT INTO members (nama, email, phone, subs_id) values ('$nama', '$email', '$phone', '$subs_id')";
        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    function delete($id)
    {
        $query = "delete FROM members WHERE id = '$id'";

        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    function edit($id)
    {
        $name = $_POST['nama'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subs_id = $_POST['subs_id'];
        $query = "update members set nama = '$name', email = '$email', phone='$phone', subs_id = '$subs_id' where id = '$id'";
        return $this->executeAffected($query);
    }

}


?>
