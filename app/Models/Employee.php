<?php

namespace App\Models;

use App\Models\Cuti;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    public $primaryKey = 'nomor_induk';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $lastEmployee = Employee::orderBy('nomor_induk', 'desc')->first();
            if ($lastEmployee) {
                $lastNumber = intval(substr($lastEmployee->nomor_induk, 2));
                $newNumber = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);
            } else {
                $newNumber = "06001";
            }
            $model->nomor_induk = 'IP' . $newNumber;
        });
    }

    protected $fillable = [
        'nama',
        'alamat',
        'tanggal_lahir',
        'tanggal_bergabung',
    ];

    public function cuti()
    {
        return $this->hasMany(Cuti::class, 'nomor_induk_id', 'nomor_induk');
    }
}
