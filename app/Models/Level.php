<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Level extends Model
{
    use HasFactory;

    public static function  has_permission($permission)
    {
        $id = Auth()->user()->id;
        $level = DB::select("SELECT level_id from users where id='$id'");
        $level = $level[0]->level_id;
        $valid = DB::select("SELECT `$permission` FROM levels WHERE id ='$level'");
        return $valid[0]->$permission;
    }
    public static function update_level($id,$columns){

        $sql = "UPDATE `levels` SET ";
        foreach ($columns as $column) {
            $sql .= "`$column`='0',";
        }
        $sql = rtrim($sql, ',');
        $sql .= " WHERE `id`='$id'";
        $level = DB::select($sql);
    }
}
