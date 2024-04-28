<?php

namespace App\Http\Controllers;

use App\Models\Dryer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class DryerController
 * @package App\Http\Controllers
 */
class DryerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dryers = Dryer::paginate(10);

        return view('dryer.index', compact('dryers'))
            ->with('i', (request()->input('page', 1) - 1) * $dryers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dryer = new Dryer();
        return view('dryer.create', compact('dryer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'weight' => 'required',
            'date' => 'required|date',
            'status' => 'required',
        ]);

        // Generate a unique number for the dryer_no column
        $uniqueNumber = date('YmdHis') . Str::random(2); // Generates a datetime-based unique number

        // Ensure uniqueness in the database
        do {
            $uniqueNumber = 'DR-'.date('Ymd-His');
        } while (Dryer::where('dryer_no', $uniqueNumber)->exists());

        // Create a new Dryer instance with the validated data and unique number
        $dryer = new Dryer([
            'product_id' => $request->input('product_id'),
            'dryer_no' => $uniqueNumber,
            'weight' => $request->input('weight'),
            'quantity' => $request->input('quantity'),
            'date' => $request->input('date'),
            'status' => $request->input('status'),
        ]);

        $product = Product::find($request->input('product_id'));
        $product->weight -= $dryer->weight;
        $product->save();

        // Save the dryer instance to the database
        $dryer->save();

        return redirect()->route('dryers.index')
            ->with('success', 'Dryer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dryer = Dryer::find($id);

        return view('dryer.show', compact('dryer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dryer = Dryer::find($id);

        return view('dryer.edit', compact('dryer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Dryer $dryer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dryer $dryer)
    {
        request()->validate(Dryer::$rules);

        $dryer->update($request->all());

        return redirect()->route('dryers.index')
            ->with('success', 'Dryer updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Dryer $dryer)
    {
        $dryer->product->weight += $dryer->weight;
        $dryer->product->save();
        // Get the associated DryerToStock records
        $dryerToStocks = $dryer->dryerToStocks;

        // Iterate over each DryerToStock record
        foreach ($dryerToStocks as $dryerToStock) {
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
        }

        // Delete the associated DryerToStock records
        $dryer->dryerToStocks()->delete();

        // Delete the Dryer record
        $dryer->delete();

        // Redirect to the index page with a success message
        return redirect()->route('dryers.index')
            ->with('success', 'Dryer and associated records deleted successfully.');
    }
}
