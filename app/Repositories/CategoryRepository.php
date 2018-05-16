<?php namespace App\Repositories;

use App\Models\Categories;
use Repositories\Contracts\RepositoryInterface;
use Repositories\Eloquent\Repository;



class CategoryRepository extends Repository {

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\Categories';
    }
}