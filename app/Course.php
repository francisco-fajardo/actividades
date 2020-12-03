<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["year", "career", "section"];

    /**
     * Disable timestamps.
     */
    public $timestamps = false;

    /**
     * Get the Course's full name.
     *
     * @param string $value
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->year .
            " " .
            ucfirst($this->career) .
            ' "' .
            strtoupper($this->section) .
            '"';
    }
}
