<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EmergencyTriggerRequest;
use App\Models\EmergencyType;
use App\Models\Location;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function trigger(EmergencyTriggerRequest $request)
    {
        // Validate the request
        $validated = $request->validated();

        $emergencyType =
        EmergencyType::query()
            ->with('location')
            ->where('code', $validated['type'])
            ->whereRelation('location', 'code', $validated['location'])
            ->first();

        if (! $emergencyType) {
            return response()->json([
                'message' => 'Emergency type not found for the given location',
            ], 404);
        }

        $location = Location::whereRelation('app', 'api_key', $validated['key'])
            ->where('code', $validated['location'])
            ->firstOrFail();

        $location->update([
            'emergency_type_id' => $emergencyType?->id,
        ]);

        return response()->json([
            'message' => 'Emergency triggered successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
