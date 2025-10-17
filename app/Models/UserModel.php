<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'users';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'id',
        'nama',
        'npm',
        'kelas_id',
        'created_at',
        'updated_at'
    ];

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    protected static function boot(){
        parent::boot();

        static::creating(function ($model){
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function getUser() {
        return $this->join('kelas', 'kelas.id', '=', 'users.kelas_id')
                    ->select('users.*', 'kelas.nama_kelas as nama_kelas')
                    ->get();
    }
}
