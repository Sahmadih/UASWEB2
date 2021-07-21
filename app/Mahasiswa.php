<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected   $table      = 'mahasiswa';
    protected   $fillable   = ['user_id', 'npm', 'tempat_lahir', 'tgl_lahir', 'gender', 'telepon', 'alamat'];
    public      $timestamps = false;

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }
    public function nilai()
    {
        return $this->hasOne(nilai::class,'user_id','id');
    }

}
