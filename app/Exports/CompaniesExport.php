<?php

namespace App\Exports;

use App\User;
use App\Companies;
use Maatwebsite\Excel\Concerns\FromCollection;

class CompaniesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $companies = new Companies();
        return $companies->getCompaniesByUserType('vendor');
    }
}
