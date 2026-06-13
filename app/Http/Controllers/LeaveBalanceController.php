<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaveBalances = LeaveBalance::all();
        return response()->json($leaveBalances);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'annual_leave' => 'required',
            'sick_leave' => 'required',
            'paternity_leave' => 'required',
            'unpaid_leave' => 'required',
        ]);

        $leaveBalance = LeaveBalance::create([
            'user_id' => $request->user_id,
            'annual_leave' => $request->annual_leave,
            'sick_leave' => $request->sick_leave,
            'paternity_leave' => $request->paternity_leave,
            'unpaid_leave' => $request->unpaid_leave,
        ]);

        return response()->json($leaveBalance);
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
        $leaveBalance = LeaveBalance::find($id);

        if (!$leaveBalance) {
            return response()->json(['message' => 'Leave balance record not found'], 404);
        }

        $leaveBalance->update([
            'user_id' => $request->user_id,
            'annual_leave' => $request->annual_leave,
            'sick_leave' => $request->sick_leave,
            'paternity_leave' => $request->paternity_leave,
            'unpaid_leave' => $request->unpaid_leave,
        ]);

        return response()->json($leaveBalance);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $leaveBalance = LeaveBalance::find($id);

        if (!$leaveBalance) {
            return response()->json(['message' => 'Leave balance record not found'], 404);
        }

        $leaveBalance->delete();
        return response()->json(['message' => 'Leave balance record deleted successfully']);
    }
}
