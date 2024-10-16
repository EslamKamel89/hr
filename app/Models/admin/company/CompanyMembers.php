<?php

namespace App\Models\admin\company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CompanyMembers extends Model
{
    use HasFactory;
    public function addCompanyMember($data, $id)
    {
        DB::delete("delete from company_members where company_id = ?", [$id]);
        if (isset($data['name'])) {
            foreach ($data['name'] as $k => $v) {
                if ($data['name'] != null) {
                    $member  = new CompanyMembers();
                    $member->company_id = $id;
                    $member->name = $data['name'][$k];
                    $member->national_id = $data['national_id'][$k];
                    $member->nationality = $data['nationality'][$k];
                    $member->role = $data['role'][$k];
                    $member->percent = $data['percent'][$k];
                    $member->name ? $member->save() : "";
                }
            }
        }
    }
}
