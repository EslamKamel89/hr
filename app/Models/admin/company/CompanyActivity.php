<?php

namespace App\Models\admin\company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CompanyActivity extends Model
{
    use HasFactory;
    public function addCompanyActivity($data,$id){
        DB::delete("delete from company_activities where company_id = ?", [$id]);

        if(isset($data['name'])){
            foreach($data['name'] as $k=>$v){
                if($data['name']!=null){
                    $activity  = new CompanyActivity();
                    $activity->company_id = $id;
                    $activity->name =$data['name'][$k];
                    $activity->name?$activity->save():"";
                }
            }
        }
    }
}
