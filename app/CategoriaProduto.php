<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{
    protected $table = 'categoria_produtos';

    protected $fillable = [
        'nome_categoria',
    ];

    public function relProdutos(){
        return $this->hasMany('App\Produto', 'id_categoria');
    }
}
