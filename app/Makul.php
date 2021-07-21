<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Makul extends Model
{
    protected   $table       = 'makul';
    protected   $fillable    = ['kd_makul', 'nama_makul', 'sks'];
    protected   $primaryKey  = 'id';
    public      $timestamps  = false;

    public function nilai()
    {
        return $this->hasMany(nilai::class, 'makul_id', 'id');
    }

}
