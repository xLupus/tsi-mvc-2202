<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendas extends Model
{
    use HasFactory;

    protected $fillable = ['id',
                           'cliente_id',
                           'vendedor_id',
                           'data_da_venda'];

    protected $table = 'vendas';

    public function Comprador()
    {
      return $this->belongsTo(CLientes::class, 'cliente_id');
    }

    public function Vendedor()
    {
      return $this->belongsTo(CLientes::class, 'vendedor_id');
    }

    public function NotaFiscal()
    {
      return $this->hasOne( NotsaFiscals::class, 'venda_id');
    }
}
