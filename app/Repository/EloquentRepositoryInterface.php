<?php

namespace App\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
  /**
   * Get all models
   *
   * @param array $columns
   * @param array $relations
   * @return Collection
   */
  public function all(array $columns = ['*'], array $relations = []): Collection;

  /**
   * Get all models with pagination
   *
   * @param int $perPage
   * @param array $columns
   * @param array $relations
   * @return Collection
   */
  public function allPaginate(array $columns = ['*'], array $relations = [], int $perPage = 10): LengthAwarePaginator;

  /**
   * Get all trashed models
   *
   * @param array $columns
   * @param array $relations
   * @return Collection
   */
  public function allTrashed(array $columns = ['*'], array $relations = []): Collection;

  /**
   * Get all trashed models with pagination
   *
   * @param int $perPage
   * @param array $columns
   * @param array $relations
   * @return Collection
   */
  public function allTrashedPaginate(array $columns = ['*'], array $relations = [], int $perPage = 10): Collection;

  /**
   * Find model by id
   * 
   * @param int|string $id
   * @return Model|null
   */
  public function find($id): ?Model;

  /**
   * Find model trashed by id
   *
   * @param int|string $id
   * @return Model|null
   */
  public function findTrashed($id): ?Model;

  /**
   * Find model with trashed by id
   *
   * @param int|string $id
   * @return Model|null
   */
  public function findWithTrashed($id): ?Model;

  /**
   * Create a model
   * 
   * @param array $payload
   * @return Model|null
   */
  public function create(array $payload): ?Model;

  /**
   * Update a model
   *
   * @param int|string $id
   * @param array $payload
   * @return bool
   */
  public function update($id, array $payload): bool;

  /**
   * Deleted a model
   *
   * @param int|string $id
   * @return boolean
   */
  public function delete($id): bool;

  /**
   * Restore a model
   *
   * @param int|string $id
   * @return boolean
   */
  public function restore($id): bool;

  /**
   * Force deleted a model
   *
   * @param int|string $id
   * @return boolean
   */
  public function forceDelete($id): bool;
}
