<?php
/**
 * Created by PhpStorm.
 * User: foush
 * Date: 16/05/18
 * Time: 05:13 م
 */

namespace App\Repositories\Criteria\Categories;


    use App\Repositories\Criteria\Criteria;
    use Repositories\Contracts\CriteriaInterface;
    use Repositories\Contracts\RepositoryInterface as Repository;

    class ModulePulicCriteria extends Criteria
    {
        /**
         * @param $model
         * @param RepositoryInterface $repository
         * @return mixed
         */
        public function apply($model, Repository $repository)
        {
            $query = $model->where('status', '=', 'published');
            return $query;
        }

    }