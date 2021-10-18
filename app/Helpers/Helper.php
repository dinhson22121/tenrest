<?php

namespace App\Helpers;

class Helper
{
    public static function menu($menus){
        $html = '';
        foreach ($menus as $menu) {

                    $html .= '<tr>
                        <td>'.$menu->id.'</td>
                        <td>'.$menu->name.'</td>
                        <td>'.$menu->detail.'</td>
                        <td>Còn hoạt động</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/menus/edit/'.$menu->id.'"><span class="material-icons"> mode_edit</span></a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="removeRow('.$menu->id.',\'/admin/menus/destroy\')"><span class="material-icons">
delete
</span></a>
                        </td>
                    </tr>';
        }
        return $html;
    }

}
