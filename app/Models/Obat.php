<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'id_obat';
    public $timestamps = false;

    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'bentuk',
        'satuan',
        'kategori',
        'harga_jual',
        'status_aktif',
    ];

    public function stok()
    {
        return $this->hasOne(StokFarmasi::class, 'id_obat', 'id_obat');
    }

    public function resepDetails()
    {
        return $this->hasMany(ResepDetail::class, 'id_obat', 'id_obat');
    }
}
