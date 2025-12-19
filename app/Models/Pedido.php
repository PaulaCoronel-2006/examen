<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = ['cliente', 'telefono', 'servicio', 'cantidad_prendas', 'estado'];


    static public function getPedidos()
    {
        return self::all();
    }
    static public function getPedidoById($id)
    {
        return self::find($id);
    }

    static public function createPedido($data)
    {
        return self::create($data);
    }

    public function updatePedido($data)
    {
        return $this->update($data);
    }
    static public function deletePedido(Pedido $pedido)
    {
        $pedido->delete();
    }

}
