<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'address',
        'department_id',
        'city_id',
        'state_id',
        'country_id',
        'zip',
        'birth_date',
        'date_hired'
    ];
    public function state()
    {
        return $this->belongsTo('App\Models\State',)->withDefault();
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department',)->withDefault();
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country',)->withDefault();
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City',)->withDefault();
    }
}
