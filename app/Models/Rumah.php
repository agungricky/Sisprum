<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    protected $fillable = ['nomor_rumah', 'foto_rumah', 'alamat_rumah'];
}
