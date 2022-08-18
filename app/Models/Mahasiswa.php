<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    /**
     * Get the phone associated with the user.
     */
    public $incrementing=false;
    protected $fillable=['nim','nama'];
}
