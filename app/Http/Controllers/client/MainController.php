<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\FlashSale;
use App\Models\ImageValues;
use App\Models\Products;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeCategory = Categories::whereIn('id', config('handle.home_category'))
            ->get();

        $arySlider = Slider::with(['image' => function ($q) {
            $q->where('is_primary', config('handle.primary_image.primary'))
                ->where('image_type', config('handle.image_type.slider'));
        }])
            ->where('status', config('handle.status.on'))
            ->limit(config('handle.show_slider'))
            ->get();

        $aryCategory = Categories::with(['image' => function ($q) {
            $q->where('is_primary', config('handle.primary_image.primary'))
                ->where('image_type', config('handle.image_type.category'));
        }])
            ->where('status', config('handle.status.on'))
            ->limit(config('handle.show_cate_index'))
            ->get()
            ->toArray();

        Artisan::call('valid:flash:sale');
        Artisan::output();

        $aryFlashSale = FlashSale::all();
        // foreach ($aryFlashSale as $key => $flashSale) {
        //     $endMaterial = explode('/', $flashSale->end);
        //     $endDay = Carbon::createFromDate((int)$endMaterial[2], (int)$endMaterial[0], (int)$endMaterial[1], 'Asia/Ho_Chi_Minh')->addDay(1);
        //     $today = Carbon::now();
            
        //     if ($endDay->toDateString() <= $today->toDateString()) {
        //         FlashSale::where('end', $flashSale->end)->each(function($item) {
        //             $item->delete();
        //         });
        //     }
        // }
        $aryFlashSaleProdImage = null;
        if (!$aryFlashSale->isEmpty()) {
            $flashSaleProdId = explode(',', $aryFlashSale->first()->related_id);

            $aryFlashSaleProdImage = ImageValues::where('image_type', config('handle.image_type.product'))
                ->whereIn('related_id', $flashSaleProdId)
                ->where('is_primary', config('handle.primary_image.primary'))
                ->first();
        }

        return view('client.index', compact('arySlider', 'aryCategory', 'homeCategory', 'aryFlashSale', 'aryFlashSaleProdImage'));
    }

    public function getProductByCategory(Request $request)
    {
        $aryProduct = Products::with([
            'image' => function ($q) {
                $q->where('is_primary', config('handle.primary_image.primary'))
                    ->where('image_type', config('handle.image_type.product'));
            },
            'categories'
        ])
            ->whereHas('categories', function ($query) use ($request) {
                $query->where('categories.id', $request->cateID);
            })
            ->where('status', config('handle.status.on'))
            ->limit(config('handle.show_prod_index'))
            ->get();

        return response()->json($aryProduct, 200);
    }
}
