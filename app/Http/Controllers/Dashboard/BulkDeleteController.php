<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BulkDeleteController extends Controller
{
    public function bulkDelete()
    {

        $ids = request()->input('ids');
        $model = 'App\Models\\' . request()->model;
        if (empty($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'No items selected for deletion.'
            ]);
        }

        try {
            $model::whereIn('id', $ids)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Selected items have been deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete items. Please try again.'
            ]);
        }
    }
}