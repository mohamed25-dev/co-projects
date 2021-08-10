<?php

namespace App\Http\View\Composers;
use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
  protected $category;

  public function __construct(Category $category)
  {
    $this->category = $category;
  }

  public function compose (View $view) {
    return $view->with('categories', $this->category->all());
  }
}
