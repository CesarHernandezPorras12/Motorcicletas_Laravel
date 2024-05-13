<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str; 
use Cviebrock\EloquentSluggable\Services\SlugService; 


class ProductController extends Controller
{
        /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }
    
    public function store(Request $request)
    {
        // Valida los datos enviados por el formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        // Crea una nueva instancia de producto con los datos proporcionados
        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'photo' => $request->input('photo'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
        ]);
    
        // Generar el slug utilizando el paquete "sluggable"
            $slug = SlugService::createSlug(Product::class, 'slug', $product->name);

            $product->slug = $slug;
            $product->save();

        // Redirecciona de regreso a la página de listado de productos
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }
    
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', compact('product'));
    }    
    
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }
    
    
    public function update(Request $request, $id)
{
    // Valida los datos enviados por el formulario
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'photo' => 'nullable|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
    ]);

    // Busca el producto por su ID
    $product = Product::findOrFail($id);

    // Actualiza los campos del producto con los nuevos valores
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->photo = $request->input('photo');
    $product->price = $request->input('price');
    $product->category_id = $request->input('category_id');

    // Guarda los cambios en la base de datos
    $product->save();

    // Generar el slug utilizando el paquete "sluggable"
    $slug = SlugService::createSlug(Product::class, 'slug', $product->name);

    $product->slug = $slug;
    $product->save();

      // Redirecciona a la página de detalles del producto actualizado
        return redirect()->route('products.show', $product->slug)->with('success', 'Producto actualizado correctamente.');
}
        
    
    public function destroy($id)
    {
        // Encuentra el producto por su ID
        $product = Product::findOrFail($id);
    
        // Elimina el producto
        $product->delete();
    
        // Redirecciona de regreso a la página de listado de productos
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
    

}
