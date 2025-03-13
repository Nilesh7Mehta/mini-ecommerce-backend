<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Get all products
    public function index()
    {
        $products = Product::where('status', 1)
        ->where('stock_quantity', '>', 1)
        ->get();

        return response()->json($products);
    }

    // Add a new product (Admin only)
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'stock_quantity' => 'required|numeric',
            'status' => 'required|boolean',
            
        ]);
     

        // Save Product
        $product = new Product([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock_quantity' => $request->stock_quantity,
            'status' => $request->status,

        ]);
        $product->save();

        return response()->json(['message' => 'Product added successfully!'], 201);
    }


    // Update product details (Admin only)
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Validate Input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock_quantity' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        // Update Product
        $product->update($validatedData);

        return response()->json([
            'message' => 'Product updated successfully!',
            'product' => $product
        ]);
    }


    // Delete a product (Admin only)
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully!']);
    }

    public function showsingleProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }
}
