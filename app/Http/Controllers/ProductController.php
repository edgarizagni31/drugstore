<?php

namespace App\Http\Controllers;

use App\Events\StockUpdate;
use App\Events\UserAction;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'supplier'])->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('products.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit_value' => 'required|numeric',
            'total_value' => 'required|numeric',
            'quantity' => 'required|numeric',
            'due_date' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();
        $data['stock_actual'] = $data['quantity'];

        $product = Product::create($data);
        $user = Auth::user();

        UserAction::dispatch($user, 'PRODUCT_CREATED', $product);

        return redirect()->route('products.index')
            ->with('success', 'Producto creado con éxito.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('products.edit', compact('product', 'categories', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit_value' => 'required|numeric',
            'total_value' => 'required|numeric',
            'quantity' => 'required|numeric',
            'due_date' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id',
            'category_id' => 'required|exists:categories,id',
        ]);
        $oldQuantity = $product->quantity;
        $data = $request->all();
        $data['stock_actual'] = $data['quantity'];
        $user = Auth::user();
        
        $product->update($data);

        UserAction::dispatch($user, 'PRODUCT_UPDATED', $product);

        echo $oldQuantity != $data['quantity'];

        if ($oldQuantity != $data['quantity']) {
            StockUpdate::dispatch($user, $product, $oldQuantity, $data['quantity']);
        }

        return redirect()->route('products.index')
            ->with('success', 'Producto actualizado con éxito.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Producto eliminado con éxito.');
    }
}
