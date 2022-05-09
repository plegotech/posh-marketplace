<?php

namespace App\Exports;

use App\User;
use App\Companies;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompaniesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $companies = new Companies();
        return $companies->getCompaniesByUserType('vendor');
    }

    public function headings():array
    {
        return ["ID", "LOGO", "NAME", "COMPANY CONTACT", "ZIP CODE", "LICENCE", "EIN", "VENDOR ID",
            "SUBSCRIPTION FEE", "ADDRESS", "CITY", "STATE", "COUNTRY", "CREATED_AT", "UPDATED AT",
            "FIRST NAME", "LAST NAME", "PHONE", "EMAIL", "LAST LOGIN", "SIGNUP"];
    }
}
