<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityLogController extends Controller
{
    /**
     * vrací seznam všech aktivit v logu
     *
     * @param Illuminate\Http\Request
     * @return \App\Http\Controllers\Illuminate\View\View
     * @return \App\Http\Controllers\Illuminate\Http\JsonResponse
     */
    public function readAll(Request $request): View|JsonResponse
    {
        $log = ActivityLog::getLog();

        // response
        $data = ['log' => $log, 'request' => $request];

        return $request->json === true ? response()->json($data) : view('activity_log/readAll', $data);
    }

    /**
     * vrací detail aktivity v logu
     *
     * @param Illuminate\Http\Request
     * @return \App\Http\Controllers\Illuminate\Http\JsonResponse
     */
    public function getDetail(Request $req): JsonResponse
    {
        // all the activity that happend in the batch
        $log = ActivityLog::where(['id' => $req->id])->first();

        return response()->json($log->properties);
    }
}
