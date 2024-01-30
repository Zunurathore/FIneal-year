<?php

namespace App\Imports;

use App\Models\studentsrecords;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentRecordImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new studentsrecords([
            'name'       => $row['name'],
            'email'      => $row['email'],
            'pnumber'     => $row['phone_number'],
            'department' => $row['department'],
            'session'    => $row['session'],
            'regno'      => $row['regno'],
        ]);
        // return new studentsrecords([
        //     'name'       => $row[0],
        //     'email'      => $row[1],
        //     'session'    => $row[4],
        //     'department' => $row[3],
        //     'regno'      => $row[5],
        //     'pnumber'    => $row[2],
        // ]);

    }
    public function headingRow(): int
    {
        return 1; // Define the row number where your headers are located (usually 1)
    }
    public function rules(): array
    {
        return [
            'name' => 'required', // Adjust validation rules as per your requirements
            'email' => 'required|email|unique:studentsrecords,email',
            'phone_number' => 'required|min:10',
            'department' => 'required',
            'session' => 'required',
            'regno' => 'required|unique:studentsrecords,regno',
            // Add other validation rules as needed for columns
        ];
    }
}
