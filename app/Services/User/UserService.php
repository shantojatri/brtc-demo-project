<?php

namespace App\Services\User;

use Exception;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService {

    protected $model;

    public function __construct()
    {
        $this->model = User::class;
    }

    public function getPaginateData(int $perPage = 10){
        return parent::getPaginate($perPage);
    }

    public function storeOrUpdateData(array $data, $id = null){
        try {
            $data['password'] = Hash::make($data['password']);
            $user = parent::storeOrUpdate($data, $id);
            return $user;
        } catch (Exception $e) {
            Log::info('Something went wrong- '. $e->getMessage());
        }
    }
}
