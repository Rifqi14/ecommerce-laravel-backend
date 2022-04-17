<?php

namespace App\Repository\Eloquent\Area;

use App\Models\Area\Country;
use App\Repository\CountryRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class CountryRepository extends BaseRepository implements CountryRepositoryInterface
{
  /**
   * @var Model
   */
  protected $model;

  /**
   * BaseRepository constructor.
   *
   * @param Country $model
   */
  public function __construct(Country $model)
  {
    $this->model = $model;
  }

  /**
   * Find model by column
   *
   * @param string $column
   * @param string $operator
   * @param string|string[] $value
   * @return Country|null
   */
  public function findByCode(string $column, string $operator = '=', $value): ?Country
  {
    return $this->model->where($column, $operator, $value)->first();
  }
}
