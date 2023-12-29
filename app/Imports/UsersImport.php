<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    
    public function model(array $row)
    {
        return new User([
            
            'full_name'=> $row[0],
            'phone_number'=> $row[1],
            'email'=> $row[2], 
            
        ]);
    }
}
