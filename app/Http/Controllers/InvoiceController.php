<?php

namespace App\Http\Controllers;

use App\Models\FilmColor;
use App\Models\HandleColor;
use App\Models\Opening;
use App\Models\PaintColor;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function download(Request $request)
    {
        $paint_colors = PaintColor::where('code', $request->paint_colors)->first()->en_lang;
        $film_colors = FilmColor::where('code', $request->film_colors)->first()->en_lang;
        $handle_colors = HandleColor::where('code', $request->handle_colors)->first()->en_lang;
        $widths = $request->widths;
        $heights = $request->heights;
        $opening = Opening::where('code', $request->opening)->first()->en_lang;
        $total_price = $request->total_price;

        $pdf = PDF::loadView('pdf.invoice', compact('paint_colors', 'film_colors', 'handle_colors',
            'widths', 'heights', 'opening', 'total_price'));

        return $pdf->download('invoice.pdf');
    }
}
