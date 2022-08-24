<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendas extends Model
{
    use HasFactory;

    protected $fillable = ['id',
                           'cliente_id',
                           'vendedor_id'];

    protected $table = 'vendas';
}
