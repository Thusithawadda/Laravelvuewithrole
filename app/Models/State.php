<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'name'
    ];

    /**
     * State Country Relationships
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Models\Country',)->withDefault();
    }

    /**
     * A city may belong to multiple City
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function city()
    {
        return $this->hasMany('App\Models\City')->withTimestamps();
    }

    /**
     * State Country Relationships
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->hasMany('App\Models\Employee',)->withDefault();
    }
}
