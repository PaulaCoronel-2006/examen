<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::getPedidos();
        return view('Pedidos.index', compact('pedidos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required|regex:/^[a-zA-Z\s]+$/|max:100',
            'telefono' => 'required|numeric',
            'servicio' => 'required',
            'cantidad_prendas' => 'required|integer|min:1',
        ]);

        Pedido::createPedido($request->all());
        return redirect()->route('pedidos.index')->with('success', 'Pedido registrado.');
    }

    public function create()
    {
        return view('Pedidos.create');
    }


    public function edit(Pedido $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'cliente' => 'required|max:100',
            'telefono' => 'required',
        ]);

        $pedido->updatePedido($request->all());
        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado.');
    }

    public function destroy(Pedido $pedido)
    {
        Pedido::deletePedido($pedido);
        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado.');
    }
}
