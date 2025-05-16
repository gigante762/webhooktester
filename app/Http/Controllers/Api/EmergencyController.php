<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EmergencyTriggerRequest;
use App\Models\EmergencyType;
use App\Models\Location;

class EmergencyController extends Controller
{
    public function trigger(EmergencyTriggerRequest $request)
    {
        $emergencyType =
        EmergencyType::query()
            ->where('code', $request->type)
            ->whereHas('location', function ($query) use ($request) {
                $query->whereRelation('app', 'api_key', $request->key);
            })
            ->when($request->location, function ($query) use ($request) {
                $query->whereRelation('location', 'code', $request->location);
            })
            ->first();

        if (! $emergencyType) {
            return response()->json([
                'message' => 'Emergency type not found for the given location or app',
            ], 404);
        }

        Location::whereRelation('app', 'api_key', $request->key)
            ->when($request->location, function ($query) use ($request) {
                $query->where('code', $request->location);
            })
            ->update([
                'emergency_type_id' => $emergencyType->id,
            ]);

        return response()->json([
            'message' => 'Emergency triggered successfully',
        ]);
    }

    public function cancel(EmergencyTriggerRequest $request)
    {
        $emergencyType =
        EmergencyType::query()
            ->where('code', $request->type)
            ->whereHas('location', function ($query) use ($request) {
                $query->whereRelation('app', 'api_key', $request->key);
            })
            ->when($request->location, function ($query) use ($request) {
                $query->whereRelation('location', 'code', $request->location);
            })
            ->first();

        if (! $emergencyType) {
            return response()->json([
                'message' => 'Emergency type not found for the given location or app',
            ], 404);
        }

        Location::whereRelation('app', 'api_key', $request->key)
            ->when($request->location, function ($query) use ($request) {
                $query->where('code', $request->location);
            })
            ->whereNotNull('emergency_type_id')
            ->update([
                'emergency_type_id' => null,
            ]);

        return response()->json([
            'message' => 'Emergency cancelled successfully',
        ]);
    }

    public function status(EmergencyTriggerRequest $request)
    {
        $location = Location::whereRelation('app', 'api_key', $request->key)
            ->when($request->location, function ($query) use ($request) {
                $query->where('code', $request->location);
            })
            ->with('emergencyType')
            ->get()
            ->pluck('*.emergencyType')
            ->flatten()
            ->unique('id')
            ->filter();

        return response()->json([
            'emergency_type' => $location->toArray(),
        ]);
    }
}
