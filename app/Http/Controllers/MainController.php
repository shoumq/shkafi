<?php

namespace App\Http\Controllers;

use App\Models\FilmColor;
use App\Models\HandleColor;
use App\Models\Height;
use App\Models\Opening;
use App\Models\PaintColor;
use App\Models\Product;
use App\Models\Width;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MainController extends Controller
{

    // Получаем цвет покраски
    public function getPaintColors(): JsonResponse
    {
        $colors = PaintColor::all();
        return response()->json($colors);
    }

    // Получаем цвет плёнки
    public function getFilmColors(): JsonResponse
    {
        $colors = FilmColor::all();
        return response()->json($colors);
    }

    // Получаем цвет ручки
    public function getHandleColors(): JsonResponse
    {
        $colors = HandleColor::all();
        return response()->json($colors);
    }

    // Получаем ширину
    public function getWidths(): JsonResponse
    {
        $widths = Width::all();
        return response()->json($widths);
    }

    // Получаем высоту
    public function getHeights(): JsonResponse
    {
        $heights = Height::all();
        return response()->json($heights);
    }

    // Получаем открывание
    public function getOpening(): JsonResponse
    {
        $opening = Opening::all();
        return response()->json($opening);
    }

    public function createProduct(Request $request): JsonResponse
    {
        $request->validate([
            'paint_colors' => ['string', 'min:1'],
            'film_colors' => ['string', 'min:1'],
            'handle_colors' => ['string', 'min:1'],
            'widths' => ['string', 'min:1'],
            'heights' => ['string', 'min:1'],
            'opening' => ['string', 'min:1'],
        ]);

        $product = new Product();
        $product->paint_colors = $request->paint_colors;
        $product->film_colors = $request->film_colors;
        $product->handle_colors = $request->handle_colors;
        $product->widths = $request->widths;
        $product->heights = $request->heights;
        $product->opening = $request->opening;
        $product->accessories = "accessories";
        $product->total_price = $request->total_price;
        $product->save();

        return response()->json($product);
    }
}
