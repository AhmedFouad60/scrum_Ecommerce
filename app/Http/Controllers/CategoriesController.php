<?php

namespace App\Http\Controllers;


use App\Repositories\CategoryRepository as Category;
use App\Repositories\Criteria\Categories\ModulePulicCriteria;


class CategoriesController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    public function __construct(Category $category) {

        $this->category = $category;
    }
    public function index() {

        $this->category->pushCriteria(new ModulePulicCriteria());
                return \Response::json($this->category->all());
    }






}
