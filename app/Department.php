<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["name", "description"];

    /**
     * Disable timestamps.
     */
    public $timestamps = false;
}
