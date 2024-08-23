<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'cuti';
    public $timestamps = true;
    public $primaryKey = 'id';
    public $keyType = 'int';
    public $incrementing = true;

    public $fillable = [
        'nomor_induk_id',
        'tanggal_cuti',
        'lama_cuti',
        'keterangan',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'nomor_induk_id', 'nomor_induk');
    }
}
