<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PropertyName;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('properties');

        // Фильтрация по свойствам
        if ($request->has('properties')) {
            foreach ($request->properties as $property => $values) {
                $propertyNameId = PropertyName::where('name', $property)->value('id');

                if ($propertyNameId) {
                    $query->whereHas('properties', function ($q) use ($propertyNameId, $values) {
                        $q->where('property_name_id', $propertyNameId)
                            ->whereIn('property_value', $values);
                    });
                }
            }
        }

        // Пагинация
        $products = $query->paginate(40);

        return response()->json($products);
    }
}
