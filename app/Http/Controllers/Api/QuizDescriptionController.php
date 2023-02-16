<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuizDescriptionRequest;
use App\Http\Resources\QuizDescriptionResource;
use App\Models\QuizDescription;
use Illuminate\Http\Request;

class QuizDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $quizDescription = QuizDescription::all();
            $response = [
                'success' => true,
                'data' => $quizDescription
            ];
            // return QuizDescriptionResource::collection($response);
            return response()->json($response, 500);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'errors' => [$e->getMessage()]
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
            $quizDescription = QuizDescription::create($request->all());
            return new QuizDescriptionResource($quizDescription);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'errors' => [$e->getMessage()]
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizDescription  $QuizDescription
     * @return \Illuminate\Http\Response
     */
    public function show(QuizDescription $quizDescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizDescription  $QuizDescription
     * @return \Illuminate\Http\Response
     */
    public function edit(QuizDescription $quizDescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizDescription  $QuizDescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizDescription $quizDescription)
    {
        try {
            $quizDescription = QuizDescription::create($request->all());
            return new QuizDescriptionResource($quizDescription);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'errors' => [$e->getMessage()]
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizDescription  $QuizDescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuizDescription $quizDescription)
    {
        try {
            $quizDescription->delete();
            return response(null, 204);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'errors' => [$e->getMessage()]
            ];
            return response()->json($response, 500);
        }
    }
}
