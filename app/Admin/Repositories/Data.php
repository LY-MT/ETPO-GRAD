<?php

namespace App\Admin\Repositories;

use App\Models\Data as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Data extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
