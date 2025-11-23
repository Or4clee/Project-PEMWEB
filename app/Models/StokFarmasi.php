<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokFarmasi extends Model
{
    protected $table = 'stok_farmasi';
    protected $primaryKey = 'id_stok';
    public $timestamps = false;

    protected $fillable = [
        'id_obat',
        'qty',
        'stok_minimal',
        'lokasi',
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }

    // helper: ubah stok +/-
    public static function ubahQty(int $idObat, int $delta): void
    {
        $stok = self::firstOrCreate(
            ['id_obat' => $idObat],
            ['qty' => 0, 'stok_minimal' => 0, 'lokasi' => 'FARMASI']
        );

        $stok->qty += $delta;
        $stok->save();
    }
}
