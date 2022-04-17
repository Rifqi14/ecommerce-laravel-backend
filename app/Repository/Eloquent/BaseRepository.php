<?php

namespace App\Repository\Eloquent;

use App\Repository\EloquentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{

  /**
   * @var Model
   */
  protected $model;

  /**
   * BaseRepository constructor.
   * @param Model $model
   */
  public function __construct(Model $model)
  {
    $this->model = $model;
  }

  /**
   * Get all models
   *
   * @param array $columns
   * @param array $relations
   * @return Collection
   */
  public function all(array $columns = ['*'], array $relations = []): Collection
  {
    return $this->model->with($relations)->get($columns);
  }

  /**
   * Get all models with pagination
   *
   * @param int $perPage
   * @param array $columns
   * @param array $relations
   * @return LengthAwarePaginator
   */
  public function allPaginate(array $columns = ['*'], array $relations = [], int $perPage = 10): LengthAwarePaginator
  {
    return $this->model->with($relations)->paginate($perPage, $columns);
  }

  /**
   * Get all trashed models
   *
   * @param array $columns
   * @param array $relations
   * @return Collection
   */
  public function allTrashed(array $columns = ['*'], array $relations = []): Collection
  {
    return $this->model->with($relations)->onlyTrashed()->get($columns);
  }

  /**
   * Get all trashed models with pagination
   *
   * @param int $perPage
   * @param array $columns
   * @param array $relations
   * @return Collection
   */
  public function allTrashedPaginate(array $columns = ['*'], array $relations = [], int $perPage = 10): Collection
  {
    return $this->model->with($relations)->onlyTrashed()->paginate($perPage, $columns);
  }

  /**
   * Find model by id
   * 
   * @param int|string $id
   * @return Model|null
   */
  public function find($id): ?Model
  {
    return $this->model->find($id);
  }

  /**
   * Find model trashed by id
   *
   * @param int|string $id
   * @return Model|null
   */
  public function findTrashed($id): ?Model
  {
    return $this->model->onlyTrashed()->findOrFail($id);
  }

  /**
   * Find model with trashed by id
   *
   * @param int|string $id
   * @return Model|null
   */
  public function findWithTrashed($id): ?Model
  {
    return $this->model->withTrashed()->findOrFail($id);
  }

  /**
   * Create a model
   * 
   * @param array $payload
   * @return Model|null
   */
  public function create(array $payload): ?Model
  {
    $model = $this->model->create($payload);

    return $model->fresh();
  }

  /**
   * Update a model
   * 
   * @param int|string $id
   * @param array $payload
   * @return bool
   */
  public function update($id, array $payload): bool
  {
    $model = $this->find($id);

    return $model->update($payload);
  }

  /**
   * Delete a model
   * 
   * @param int|string $id
   * @return bool
   */
  public function delete($id): bool
  {
    $model = $this->find($id);

    return $model->delete();
  }

  /**
   * Force delete a model
   * 
   * @param int|string $id
   * @return bool
   */
  public function forceDelete($id): bool
  {
    $model = $this->findWithTrashed($id);

    return $model->forceDelete();
  }

  /**
   * Restore a model
   * 
   * @param int|string $id
   * @return bool
   */
  public function restore($id): bool
  {
    $model = $this->findTrashed($id);

    return $model->restore();
  }
}
