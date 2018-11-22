<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'company_id', 'first_name', 'last_name', 'email', 'phone',
    ];

    public function scopeJoinCompanies($query)
    {
        $query->join('companies', function($join) {
            $join->on('employees.company_id', '=', 'companies.id');
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
