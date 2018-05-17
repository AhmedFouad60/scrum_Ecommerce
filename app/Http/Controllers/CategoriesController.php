<?php

namespace App\Http\Controllers;


use App\Http\Requests\CategoryRequest;
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

        //$this->category->pushCriteria(new ModulePulicCriteria());
                return \Response::json($this->category->all());
    }

    public function create(Request $input)
    {

    }

    public function store(CategoryRequest $input)
    {

    }

        public function show($id)
    {

    }
    public function edit($id)
    {

    }
    public function update(CategoryRequest $input, $id)
    {

    }







    /******************    The Third_party library for nestedSet   **********************/




    /**
     * @param Collection $items
     *
     * @return static
     */
    protected function makeOptions(Collection $items)
    {
        $options = [ '' => 'Root' ];

        foreach ($items as $item)
        {
            $options[$item->getKey()] = str_repeat('‒', $item->depth + 1).' '.$item->title;
        }

        return $options;
    }

    /**
     * @param Category $except
     *
     * @return CategoriesController
     */
    protected function getCategoryOptions($except = null)
    {
        /** @var \Kalnoy\Nestedset\QueryBuilder $query */
        $query = Category::select('id', 'title')->withDepth();

        if ($except)
        {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }

        return $this->makeOptions($query->get());
    }
}
