<?php

class MembersView{
    public function tampilan($data){
        $no = 1;
        $dataMembers = null;
        foreach($data as $val){
            list($id,$nama,$email, $phone, $subs_id , $join_date,$id_subs, $platfrom) = $val;
            $dataMembers .= "<tr>
                    <td>" . $no . "</td>
                    <td>" . $nama . "</td>
                    <td>" . $email . "</td>
                    <td>" . $phone . "</td>
                    <td>" . $join_date . "</td>
                    <td>" . $platfrom . "</td>  
                    <td>
                        <a href='index.php?id_edit=" . $id . "' class='btn btn-success''>Edit</a>
                        <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
            $no++;
        }
        $tmpl = new Template("templates/index.html");
        $tmpl->replace("DATA_TABEL", $dataMembers);
        $tmpl->write();
    }


    public function tampilanUpdate($data){
        $dataMembers = null;
        $dataSubsPlatform = null;
        $simpanSubs = 0;
        foreach($data['members'] as $val){
            list($id,$nama,$email, $phone,$subs_id) = $val;
            $dataMembers .= "
            
            <input type='hidden' name='id' value='$id' class='form-control'> <br>
            <label> NAME: </label>
            <input type='text' name='nama' value='$nama' class='form-control'> <br>
            <label> EMAIL: </label>
            <input type='text' name='email' value='$email' class='form-control'> <br>
            <label> PHONE: </label>
            <input type='text' name='phone' value='$phone' class='form-control'> <br>
            ";
            $simpanSubs = $subs_id;
        }

        foreach($data['subs'] as $val){
            list($id_subs, $platfrom) = $val;
            if($id_subs == $simpanSubs){
                $dataSubsPlatform .= "<option selected value='".$id_subs."'>".$platfrom."</option>";

            }else{
                $dataSubsPlatform .= "<option value='".$id."'>".$platfrom."</option>";
            }
        }

        $tpl = new Template("templates/indexEdit.html");
        $tpl->replace("FORM_UPDATE", $dataMembers);
        $tpl->replace("OPTION_PLATFORM", $dataSubsPlatform);
        $tpl->write();
    }

    public function optionForm($data){
        $dataSubsMonths = null;
        $dataSubsPlatform = null;
        foreach($data as $val){
            list($id, $platfrom) = $val;
            $dataSubsPlatform .= "<option value='".$id."'>".$platfrom."</option>";
        }

        $tpl = new Template("templates/indexAdd.html");
        $tpl->replace("OPTION_PLATFORM", $dataSubsPlatform);
        $tpl->replace("OPTION_MONTHS", $dataSubsMonths);
        $tpl->write();
    }
}


?>