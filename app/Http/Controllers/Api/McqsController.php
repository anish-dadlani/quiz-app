<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MCQS;
use App\Http\Requests\StoreMcqsRequest;
use App\Http\Resources\McqsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class McqsController extends Controller
{
    public function index() {
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

    public function create() {
        //
    }

    public function store(Request $request) {
        try {
            $MCQS = MCQS::create($request->all());
            $response = [
                'success' => true,
                'errors' => null,
                'data' => new MCQSResource($MCQS),
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

    public function show($id) {
        try {
            $mcqs = DB::table('m_c_q_s')->where('id', $id)->first();
            return response()->json([
                'success' => true,
                'errors' => null,
                'data' => $mcqs
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

    public function edit(Mcqs $mcqs) {
        //
    }

    public function update(Request $request, $id) {
        try {
            if (!$request) {
                throw new \Exception("Request is empty.");
            }

            $data['quiz_id'] = $request->quiz_id;
            $data['question'] = $request->question;
            $data['option_a'] = $request->option_a;
            $data['option_b'] = $request->option_b;
            $data['option_c'] = $request->option_c;
            $data['option_d'] = $request->option_d;
            $data['answer'] = $request->answer;
            $data['updated_at'] = now();

            $mcqs = DB::table('m_c_q_s')->where('id', $id)->update($data) == 1 ? "Record Updated Successfully" : "Something Went Wrond";
            
            $response = [
                'success' => true,
                'errors' => null,
                'data' => $mcqs,
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'errors' => [$e->getMessage()],
                'data' => null
            ];
            return response()->json($response, 500);
        }
    }

    public function destroy($id) {
        try {
            $response = [
                'success' => true,
                'errors' => null,
                'data' => DB::table('m_c_q_s')->where('id', $id)->delete() == 1 ? "Record Deleted" : "Something Went Wrong",
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
