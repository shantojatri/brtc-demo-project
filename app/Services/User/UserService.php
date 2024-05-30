<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\BaseService;

class UserService extends BaseService {

    protected $model;

    public function __construct()
    {
        $this->model = User::class;
    }

    public function getPaginateData(int $perPage = 10){
        return parent::getPaginate($perPage);
    }
}
