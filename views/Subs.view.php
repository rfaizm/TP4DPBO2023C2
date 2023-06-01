<?php

class SubsView{
    public function render($data){
        $no = 1;
        $dataSubs = null;
        foreach($data as $val){
        list($id,$platform) = $val;
            $dataSubs .= "<tr>
                    <td>" . $no . "</td>
                    <td>" . $platform . "</td>
                    <td>
                    <a href='subs.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
            $no++;
        }

        $tpl = new Template("templates/subs.html");
        $tpl->replace("DATA_TABEL", $dataSubs);
        $tpl->write();
    }
    

}