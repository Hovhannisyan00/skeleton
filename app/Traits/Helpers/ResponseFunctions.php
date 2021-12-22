<?php

namespace App\Traits\Helpers;

use Illuminate\Http\JsonResponse;

/**
 * Trait ResponseFunctions
 * @package App\Traits\Helpers
 */
trait ResponseFunctions
{
    /**
     * Function to send response
     *
     * @param array $result
     * @param int $statusCode
     * @return JsonResponse
     */
    public function sendResponse(array $result = [], int $statusCode = 200): JsonResponse
    {
        return response()->json($result, $statusCode);
    }

    /**
     * Function to send OK response
     *
     * @param array $response
     * @return JsonResponse
     */
    public function sendOk(array $response = []): JsonResponse
    {
        $response['status'] = 'OK';

        return response()->json($response);
    }

    /**
     * Function to send OK response with created message
     *
     * @param array $response
     * @return JsonResponse
     */
    public function sendOkCreated(array $response = []): JsonResponse
    {
        $response['status'] = 'OK';
        $response['message'] = trans('sortit.message.successfully_created');

        return response()->json($response);
    }

    /**
     * Function to send OK response with updated message
     *
     * @param array $response
     * @return JsonResponse
     */
    public function sendOkUpdated(array $response = []): JsonResponse
    {
        $response['status'] = 'OK';
        $response['message'] = trans('sortit.message.successfully_updated');

        return response()->json($response);
    }

    /**
     * Function to send OK response with deleted message
     *
     * @param array $response
     * @return JsonResponse
     */
    public function sendOkDeleted(array $response = []): JsonResponse
    {
        $response['status'] = 'OK';
        $response['message'] = trans('sortit.message.successfully_deleted');

        return response()->json($response);
    }

    /**
     * Function to send OK response with notification
     *
     * @param array $response
     * @return JsonResponse
     */
    public function sendOkWithNotification(array $response = []): JsonResponse
    {
        $response['status'] = 'OK';
        $response['message'] = trans('sortit.message.successfully_created');
        $response['update_notifications'] = true;

        return response()->json($response);
    }

    /**
     * Function to send invalid response
     *
     * @param array $response
     * @param int $statusCode
     * @return JsonResponse
     */
    public function sendInvalid(array $response = [], int $statusCode = 200): JsonResponse
    {
        $response['status'] = 'INVALID';

        return response()->json($response, $statusCode);
    }
}
