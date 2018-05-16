<?php
/**
 * Created by PhpStorm.
 * User: foush
 * Date: 16/05/18
 * Time: 04:44 م
 */

namespace Repositories\Contracts;
use App\Repositories\Criteria\Criteria;

    interface CriteriaInterface
    {
        /**
         * @param bool $status
         * @return $this
         */
        public function skipCriteria($status = true);

        /**
         * @return mixed
         */
        public function getCriteria();

        /**
         * @param Criteria $criteria
         * @return $this
         */
        public function getByCriteria(Criteria $criteria);

        /**
         * @param Criteria $criteria
         * @return $this
         */
        public function pushCriteria(Criteria $criteria);

        /**
         * @return $this
         */
        public function  applyCriteria();
    }