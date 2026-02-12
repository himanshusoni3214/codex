<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use App\Repositories\InventoryRepository;

class InventoryController extends Controller
{
    public function index(InventoryRepository $inventory)
    {
        return view('pages.inventory', [
            'inventoryItems' => $inventory->all(),
            'categories' => $inventory->categories(),
        ]);
    }

    public function show(InventoryItem $item)
    {
        return view('pages.inventory-detail', [
            'item' => $item,
            // Reuse layout meta handling
            'gemstone' => $item,
        ]);
    }
}
