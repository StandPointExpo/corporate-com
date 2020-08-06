<?php

namespace App\Http\Traits;

trait Statusable
{
    /**
     * @param $data
     * @return array
     */
    protected function success($data = []): array
    {
        return $this->getStatusWithPayload(true, $data);
    }

    /**
     * @param \Throwable $exception
     * @param $data
     * @return array
     */
    protected function fail(\Throwable $exception, $data = []): array
    {
        report($exception);
        return $this->getStatusWithPayload(false, $data);
    }

    /**
     * @param bool $status
     * @param $data
     * @return array
     */
    protected function getStatusWithPayload($status = true, $data = []): array
    {
        return compact('status', 'data');
    }

    /**
     * @param \Throwable $exception
     * @return JsonResponse
     */
    protected function errorMessageResponse(\Throwable $exception): JsonResponse
    {
        report($exception);
        return response()->json(['message' => $exception->getMessage()], (!is_int($exception->getCode())) ? 500 : $exception->getCode());
    }

    /**
     * @param string $messageKey
     * @param string $messageContent
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function message($messageKey = 'message', $messageContent = '', $statusCode = 200): JsonResponse
    {
        return response()->json([$messageKey => $messageContent], $statusCode);
    }
}
