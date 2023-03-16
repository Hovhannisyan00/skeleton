<?php

namespace App\Traits\Helpers;

use Illuminate\Http\JsonResponse;

trait ResponseFunctions
{
    /**
     * Function to send response
     */
    public function sendResponse(array $result = [], int $statusCode = 200): JsonResponse
    {
        return response()->json($result, $statusCode);
    }

    /**
     * Function to send OK response
     */
    public function sendOk(array $response = []): JsonResponse
    {
        $response['status'] = 'OK';

        return response()->json($response);
    }

    /**
     * Function to send OK response with created message
     */
    public function sendOkCreated(array $response = []): JsonResponse
    {
        $response['status'] = 'OK';
        $response['message'] = trans('__dashboard.message.successfully_created');

        return response()->json($response);
    }

    /**
     * Function to send OK response with updated message
     */
    public function sendOkUpdated(array $response = []): JsonResponse
    {
        $response['status'] = 'OK';
        $response['message'] = trans('__dashboard.message.successfully_updated');

        return response()->json($response);
    }

    /**
     * Function to send OK response with deleted message
     */
    public function sendOkDeleted(array $response = []): JsonResponse
    {
        $response['status'] = 'OK';
        $response['message'] = trans('__dashboard.message.successfully_deleted');

        return response()->json($response);
    }

    /**
     * Function to send OK response with notification
     */
    public function sendOkWithNotification(array $response = []): JsonResponse
    {
        $response['status'] = 'OK';
        $response['message'] = trans('__dashboard.message.successfully_created');
        $response['update_notifications'] = true;

        return response()->json($response);
    }

    /**
     * Function to send invalid response
     */
    public function sendInvalid(array $response = [], int $statusCode = 200): JsonResponse
    {
        $response['status'] = 'INVALID';

        return response()->json($response, $statusCode);
    }
}
