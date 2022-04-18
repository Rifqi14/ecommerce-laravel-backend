<?php

namespace App\Http\Controllers\Area;

use App\Http\Controllers\Controller;
use App\Http\Resources\Area\CountryResource;
use App\Repository\CountryRepositoryInterface;
use Illuminate\Http\Request;

class CountryController extends Controller
{
  private $countryRepository;

  public function __construct(CountryRepositoryInterface $countryRepository)
  {
    $this->countryRepository = $countryRepository;
  }

  public function index()
  {
    try {
      $countries = $this->countryRepository->all();

      return response()->success(CountryResource::collection($countries));
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
