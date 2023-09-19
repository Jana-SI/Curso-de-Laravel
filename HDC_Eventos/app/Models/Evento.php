<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $casts = [
        'itens' => 'array'
    ];

    protected $datas = ['data'];

    protected $guarded = [];

    public function usuario(){
        return $this->belongsTo('App\Models\User');
    }
}
