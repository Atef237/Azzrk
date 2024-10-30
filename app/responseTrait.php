<?php

namespace App;

trait responseTrait
{
    public function successResponse($data, $message = null, $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
            'pagination' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem(),
                'next_page_url' => $data->nextPageUrl(),
                'prev_page_url' => $data->previousPageUrl(),
            ]
        ], $code);
    }

    public function errorResponse($message = null, $code = 404)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $code);
    }

    public function successMessage($message = null, $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
        ], $code);
    }
}
