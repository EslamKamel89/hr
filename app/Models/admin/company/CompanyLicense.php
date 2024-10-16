<?php

namespace App\Models\admin\company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CompanyLicense extends Model
{
    use HasFactory;
    public function addCompanyLicense($data, $id)
    {
        DB::delete("delete from company_licenses where company_id = ?", [$id]);
        if (isset($data['name'])) {
            foreach ($data['name'] as $k => $v) {
                if ($data['name'] != null) {
                    $license  = new CompanyLicense();
                    $license->company_id = $id;
                    $license->license = $data['name'][$k];
                    $license->start_date = $data['start'][$k];
                    $license->end_date = $data['end'][$k];
                    $license->license ? $license->save() : "";
                }
            }
        }
    }
}
