<?php

namespace App\Http\Controllers\Area;

use App\Http\Controllers\Controller;
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
    $countries = $this->countryRepository->all();

    // return response()->json(['items' => $countries, 'total' => count($countries), 'success' => true, 'message' => 'Countries retrieved successfully.', 'code' => 200, 'errors' => [], 'timestamp' => time()], 200)1
    return response()->success($countries, null);
  }
}
