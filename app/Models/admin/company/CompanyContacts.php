<?php

namespace App\Models\admin\company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB ;

class CompanyContacts extends Model
{
    use HasFactory;
    public function addCompanyContact($data,$id){
        DB::delete("delete from company_contacts where company_id = ?", [$id]);
        if(isset($data['name'])){
        foreach($data['name'] as $k=>$v){
            $contact  = new CompanyContacts();
            $contact->company_id = $id;
            $contact->name =$data['name'][$k];
            $contact->value =$data['value'][$k];
            $contact->name?$contact->save():"";

        }}
    }
}
