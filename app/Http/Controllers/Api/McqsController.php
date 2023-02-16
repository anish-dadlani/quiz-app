<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MCQS;
use App\Http\Requests\StoreMcqsRequest;
use App\Http\Resources\McqsResource;
use Illuminate\Http\Request;

class McqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $mcqs = MCQS::all();
            $response = [
                'success' => true,
                'errors' => null,
                'data' => $mcqs
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'errors' => [$e->getMessage()],
                'data' => null,
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $MCQS = MCQS::create($request->all());
            return new MCQSResource($MCQS);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'errors' => [$e->getMessage()],
                'data' => null,
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mcqs  $mcqs
     * @return \Illuminate\Http\Response
     */
    public function show(Mcqs $mcqs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mcqs  $mcqs
     * @return \Illuminate\Http\Response
     */
    public function edit(Mcqs $mcqs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mcqs  $mcqs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mcqs $mcqs)
    {
        try {
            $MCQS = MCQS::create($request->all());
            return new MCQSResource($MCQS);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'errors' => [$e->getMessage()],
                'data' => null,
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mcqs  $mcqs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mcqs $mcqs)
    {
        try {
            $MCQS->delete();
            return response(null, 204);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'errors' => [$e->getMessage()],
                'data' => null,
            ];
            return response()->json($response, 500);
        }
    }
}
