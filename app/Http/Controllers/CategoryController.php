<?php

namespace App\Http\Controllers;

use App\Traits\InterfaceHandler;

class CategoryController extends Controller
{
    use InterfaceHandler;

    public function index($category)
    {

        $categorie = $this->Category()->getCategory($category);

        $products = $categorie->products;

        $brands = $this->Brand()->activeItems();

        // $colors = $this->Color()->active();

        return view('theme.categories.index', compact('categorie', 'products', 'brands'));
    }
}
