<?php

namespace App\Http\Controllers;

use App\Models\DryerToStockItem;
use Illuminate\Http\Request;

/**
 * Class DryerToStockItemController
 * @package App\Http\Controllers
 */
class DryerToStockItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dryerToStockItems = DryerToStockItem::paginate(10);

        return view('dryer-to-stock-item.index', compact('dryerToStockItems'))
            ->with('i', (request()->input('page', 1) - 1) * $dryerToStockItems->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dryerToStockItem = new DryerToStockItem();
        return view('dryer-to-stock-item.create', compact('dryerToStockItem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DryerToStockItem::$rules);

        $dryerToStockItem = DryerToStockItem::create($request->all());

        return redirect()->route('dryer-to-stock-items.index')
            ->with('success', 'DryerToStockItem created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dryerToStockItem = DryerToStockItem::find($id);

        return view('dryer-to-stock-item.show', compact('dryerToStockItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dryerToStockItem = DryerToStockItem::find($id);

        return view('dryer-to-stock-item.edit', compact('dryerToStockItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DryerToStockItem $dryerToStockItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DryerToStockItem $dryerToStockItem)
    {
        request()->validate(DryerToStockItem::$rules);

        $dryerToStockItem->update($request->all());

        return redirect()->route('dryer-to-stock-items.index')
            ->with('success', 'DryerToStockItem updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dryerToStockItem = DryerToStockItem::find($id)->delete();

        return redirect()->route('dryer-to-stock-items.index')
            ->with('success', 'DryerToStockItem deleted successfully');
    }
}
