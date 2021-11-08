<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Symfony\Component\HttpFoundation\Response;


class PortfolioController extends Controller
{
    // get portfolio
    function index($featured = null)
    {
        // check featured or not
        if($featured == null){
            // return all data
            $portfolioActive = Portfolio::where(['status' => 1])->get();
            $portfolioNotActive = Portfolio::where(['status' => 0])->get();

            $response = [
                'message' => 'Get All Data',
                'dataActive' => $portfolioActive,
                'dataNotActive' => $portfolioNotActive
            ];

            return response()->json($response, Response::HTTP_OK);

        }

        // if wrong featured
        if($featured !== 'featured'){
            return abort(404);
        }

        // if fetured
        $portfolio = Portfolio::where(['featured' => 1])->get();

        $response = [
            'message' => 'Get All Data',
            'data' => $portfolio
        ];

        return response()->json($response, Response::HTTP_OK);
    }
}
