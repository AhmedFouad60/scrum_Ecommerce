<?php
/**
 * Created by PhpStorm.
 * User: foush
 * Date: 16/05/18
 * Time: 04:39 م
 */

namespace App\Repositories\Criteria;
use Repositories\Contracts\RepositoryInterface as Repository;
use Repositories\Contracts\RepositoryInterface;

    abstract class Criteria{
        /**
         * @param $model
         * @param RepositoryInterface $repository
         * @return mixed
         */
        public abstract function apply($model, Repository $repository);

    }