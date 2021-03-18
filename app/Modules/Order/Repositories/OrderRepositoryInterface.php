<?php

namespace App\Modules\Order\Repositories;

interface OrderRepositoryInterface
{
    public function allOrder();

    public function orderByUserId($user_id);

    public function orderByFarmId($farm_id);

    public function getFarmorderByStatus($farm_id=null,$status=null);

}
