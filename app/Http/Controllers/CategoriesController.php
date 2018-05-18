<?php

namespace App\Http\Controllers;


use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use App\Repositories\CategoryRepository as Category;
use App\Repositories\Criteria\Categories\ModulePulicCriteria;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Kalnoy\Nestedset\Collection;


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
               // return \Response::json($this->category->all());
        $categories=$this->category->all();
        return \view('Admin.Categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create(Request $input)
    {
        $data = $input->only('parent_id');

        $categories = $this->getCategoryOptions();
        return view('Admin.Categories.create', compact('data', 'categories'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $input
     *
     * @return Response
     */
    public function store(CategoryRequest $input)
    {
        $category=$this->category->create($input->all());
        return redirect()
            ->route('categories.show',[$category->getKey()])
            ->with('success','Category successfully created');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
        public function show($id)
    {
        $categories=$this->category->all();
        $category=$this->category->findBy('id',$id);
        return view('Admin.Categories.show',compact(['categories','category']));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category= Categories::findOrFail($id);
        $categories = $this->getCategoryOptions($category);

        return view('Admin.Categories.edit', compact('category', 'categories'));

    }
    public function update(CategoryRequest $input, $id)
    {
        /** @var Category $category */
        $this->category->update($input->except('_method','_token'),$id);
        return redirect()->route('categories.show', [ $id ])->with('success', 'Category successfully updated!');
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
        $query = Categories::select('id', 'title')->withDepth();

        if ($except)
        {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }

        return $this->makeOptions($query->get());
    }
}
