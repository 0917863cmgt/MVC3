<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category-component', [
            'parentCategories' => Category::where('is_parent' , 1)->get(),
            'childrenCategories' => Category::where('is_parent' , 0)->get(),
            'cuisine' => Category::where('parent_id', 3),
            'course' => Category::where('parent_id', 4),
            'protein' => Category::where('parent_id', 1),
            'vegetables' => Category::where('parent_id', 2),
            'categories' => Category::firstWhere('slug', request('categories')),
        ]);
    }
}
