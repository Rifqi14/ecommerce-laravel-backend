<?php

namespace App\Service\Interface;

use App\Http\Requests\Area\Country\ListRequest;
use App\Http\Resources\Area\CountryResource;
use Illuminate\Http\Request;

interface CountryServiceInterface
{
  /**
   * Get all countries
   *
   * @param Request $request
   * @return CountryResource
   */
  public function getAll(Request $request): CountryResource;

  /**
   * Get all trashed countries
   *
   * @param Request $request
   * @return CountryResource
   */
  public function getList(ListRequest $request): CountryResource;
}
