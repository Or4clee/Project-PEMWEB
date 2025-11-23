<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResepDetail extends Model
{
    protected $table = 'resep_detail';
    protected $primaryKey = 'id_resep_detail';
    public $timestamps = false;

    protected $fillable = [
        'id_resep',
        'id_obat',
        'jumlah_diminta',
        'jumlah_diberi',
        'aturan_pakai',
    ];

    public function resep()
    {
        return $this->belongsTo(Resep::class, 'id_resep', 'id_resep');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }
}
