<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class BaseService {

    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * GetPaginate data from database using model class
     * @param int $perPage
     */
    public function getPaginate(int $perPage = 10, bool $own_data = false, string $sort = 'id', string $sort_by = 'DESC'){
        try {
            $query = $this->model::query();
            // Check data belongs to provided user
            if ($own_data) {
                $query->where('user_id', Auth::id());
            }
            // Sort data
            if ($sort) {
                $query->orderBy($sort, $sort_by);
            }
            return $query->paginate($perPage);
        } catch (Exception $e) {
            Log::info('Something went wrong- '. $e->getMessage());
        }
    }
}

