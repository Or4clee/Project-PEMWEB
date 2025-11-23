<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = 'resep';
    protected $primaryKey = 'id_resep';
    public $timestamps = false;

    protected $fillable = [
        'id_kunjungan',
        'id_pasien',
        'id_dokter',
        'tgl_resep',
        'status_resep',
        'jenis_resep',
        'catatan_dokter',
    ];

    public function details()
    {
        return $this->hasMany(ResepDetail::class, 'id_resep', 'id_resep');
    }
}
