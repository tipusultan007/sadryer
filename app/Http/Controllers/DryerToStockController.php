<?php

namespace App\Http\Controllers;

use App\Models\Dryer;
use App\Models\DryerToStock;
use App\Models\DryerToStockItem;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class DryerToStockController
 * @package App\Http\Controllers
 */
class DryerToStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dryerToStocks = DryerToStock::paginate(10);

        return view('dryer-to-stock.index', compact('dryerToStocks'))
            ->with('i', (request()->input('page', 1) - 1) * $dryerToStocks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dryerToStock = new DryerToStock();
        $dryers = \App\Models\Dryer::with('product')->where('status','active')->orderByDesc('dryer_no')->get();
        $rices = \App\Models\Product::where('product_type','rice')->get();

        return view('dryer-to-stock.create', compact('dryerToStock','dryers','rices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DryerToStock::$rules);

        $dryerToStock = DryerToStock::create($request->all());

        // Define an array of fields to iterate over
        $fields = [
            'rice' => $request->input('rice_product'),
            'dryer_kura' => 4,
            'silky_kura' => 5,
            'khudi' => 6,
            'tamri' => 7,
            'tush' => 8,
            'bali' => 9
        ];

        // Iterate over the fields
        foreach ($fields as $field => $productId) {
            // Check if the field has a positive value
            if ($dryerToStock->{$field} > 0) {
                // Create a new DryerToStockItem
                DryerToStockItem::create([
                    'dryer_to_stock_id' => $dryerToStock->id,
                    'product_id' => $productId,
                    'weight' => $dryerToStock->{$field},
                    'type' => $field
                ]);

                // Update the product weight
                $product = Product::find($productId);
                $product->weight += $dryerToStock->{$field};
                $product->save();
            }
        }

        $dryerToStock->dryer->status = 'completed';
        $dryerToStock->dryer->save();

        return redirect()->route('dryer-to-stocks.index')
            ->with('success', 'DryerToStock created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dryerToStock = DryerToStock::find($id);

        return view('dryer-to-stock.show', compact('dryerToStock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dryerToStock = DryerToStock::find($id);
        $dryers = Dryer::where('id',$dryerToStock->dryer_id)->get();
        $rices = \App\Models\Product::where('product_type','rice')->get();
        $dryerToStockItem = DryerToStockItem::where('dryer_to_stock_id', $dryerToStock->id)
            ->where('type', 'rice')
            ->first();
        return view('dryer-to-stock.edit', compact('dryerToStock','dryers','rices','dryerToStockItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DryerToStock $dryerToStock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DryerToStock $dryerToStock)
    {
        // Validate the request data
        $request->validate(DryerToStock::$rules);

        // Get the updated data from the request
        $data = $request->all();

        // Define an array of fields to iterate over
        $fields = [
            'rice' => $request->input('rice_product'),
            'dryer_kura' => 4,
            'silky_kura' => 5,
            'khudi' => 6,
            'tamri' => 7,
            'tush' => 8,
            'bali' => 9
        ];

        // Reload the original DryerToStock instance from the database
        $originalDryerToStock = DryerToStock::find($dryerToStock->id);

        // Update the DryerToStock instance with the new data
        $dryerToStock->update($data);

        // Iterate over the fields
        foreach ($fields as $field => $productId) {
            // Get the original weight of the field
            $originalWeight = $originalDryerToStock->{$field};

            // Get the updated weight of the field
            $updatedWeight = $dryerToStock->{$field};

            // Calculate the weight difference
            $weightDifference = $updatedWeight - $originalWeight;

            // Check if the weight difference is non-zero
            if ($weightDifference != 0) {
                // Update or create the corresponding DryerToStockItem
                $dryerToStockItem = DryerToStockItem::where('dryer_to_stock_id', $dryerToStock->id)
                    ->where('type', $field)
                    ->first();

                if ($dryerToStockItem) {
                    // If updated weight is zero, delete the DryerToStockItem
                    if ($updatedWeight == 0) {
                        $dryerToStockItem->delete();
                    } else {
                        $dryerToStockItem->update([
                            'product_id' => $productId,
                            'weight' => $updatedWeight,
                            'type' => $field
                        ]);
                    }
                } elseif ($updatedWeight != 0) {
                    DryerToStockItem::create([
                        'dryer_to_stock_id' => $dryerToStock->id,
                        'product_id' => $productId,
                        'weight' => $updatedWeight,
                        'type' => $field
                    ]);
                }

                // Update the product weight
                $product = Product::find($productId);
                $product->weight += $weightDifference; // Update by the difference
                $product->save();
            }
        }
        $dryerToStock->dryer->status = 'completed';
        $dryerToStock->dryer->save();
        // Redirect to the index page with a success message
        return redirect()->route('dryer-to-stocks.index')
            ->with('success', 'DryerToStock updated successfully.');
    }



    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(DryerToStock $dryerToStock)
    {
        // Get the associated DryerToStockItems
        $dryerToStockItems = $dryerToStock->items;

        // Update the product weights
        foreach ($dryerToStockItems as $item) {
            $product = Product::find($item->product_id);
            $product->weight -= $item->weight;
            $product->save();
        }

        // Delete the associated DryerToStockItems
        $dryerToStock->items()->delete();
        $dryerToStock->dryer->status = 'active';
        $dryerToStock->dryer->save();
        // Delete the DryerToStock record
        $dryerToStock->delete();

        // Redirect to the index page with a success message
        return redirect()->route('dryer-to-stocks.index')
            ->with('success', 'DryerToStock deleted successfully.');
    }

}
