<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuizDescriptionRequest;
use App\Http\Resources\QuizDescriptionResource;
use App\Models\QuizDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizDescriptionController extends Controller
{
    public function index() {
        try {
            $quizDescription = QuizDescription::all();
            $response = [
                'success' => true,
                'errors' => null,
                'data' => $quizDescription
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

    public function create() {
        //
    }

    public function store(Request $request) {
        try {
            $quizDescription = QuizDescription::create($request->all());
            $response = [
                'success' => true,
                'errors' => null,
                'data' => new QuizDescriptionResource($quizDescription),
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'errors' => [$e->getMessage()],
                'data' => []
            ];
            return response()->json($response, 500);
        }
    }

    public function show($id) {
        try {
            $quizDescription = DB::table('quiz_descriptions')->where('id', $id)->first();
            return response()->json([
                'success' => true,
                'errors' => null,
                'data' => $quizDescription
            ], 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'errors' => [$e->getMessage()],
                'data' => null,
            ];
            return response()->json($response, 500);
        }
    }

    public function edit(QuizDescription $quizDescription) {
        //
    }

    public function update(Request $request, $id) {
        try {
            if (!$request) {
                throw new \Exception("Request is empty.");
            }
            $data['title'] = $request->title;
            $data['description'] = $request->description;
            $data['updated_at'] = now();
            $quizDescription = DB::table('quiz_descriptions')->where('id', $id)->update($data) == 1 ? "Record Updated Successfully" : "Something Went Wrond";
            $response = [
                'success' => true,
                'errors' => null,
                'data' => $quizDescription,
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'errors' => [$e->getMessage()]
            ];
            return response()->json($response, 500);
        }
    }

    public function destroy($id) {
        try {
            $response = [
                'success' => true,
                'errors' => null,
                'data' => DB::table('quiz_descriptions')->where('id', $id)->delete() == 1 ? "Record Deleted" : "Something Went Wrong",
            ];
            return response($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'errors' => [$e->getMessage()],
                'data' => null
            ];
            return response()->json($response, 500);
        }
    }
}
