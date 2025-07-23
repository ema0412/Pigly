<?php

namespace App\Http\Controllers;

use App\Http\AuthRequest;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class AuthController extends Controller
{ 

    public function log()
    {
        $weight_logs = WeightLog::all();
        $perPage = 6;
        $page = Paginator::resolveCurrentPage('page');
        $pageData = $weight_logs->slice(($page -1) * $perPage, $perPage);
        $options = [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'Page'
        ];

        $weight_logs = new LengthAwarePaginator($pageData, $weight_logs->count(),$perPage,$page,$options);

        return view('log', compact('weight_logs'));

        $weight_targets = new LengthAwarePaginator($pageData, $weight_targets->count(),$perPage,$page,$options);

        $weight_targets = WeightTarget::all();
        return view('log', compact('weight_targets'));
    }

    public function search(Request $request)
    {
        if ($request->has('reset')) {
            return redirect('/weight_logs')->withInput();
        }
        $query = WeightLog::query();

        $query = $this->getSearchQuery($request, $query);

        $WeightLogs = $query->paginate(7);
        $csvData = $query->get();
        $weight_targets = WeightTarget::all();
        return view('/weight_logs', compact('WeightLog', 'weight_targets', 'csvData'));
    }

    public function destroy(Request $request)
    {
        WeightLog::find($request->id)->delete();
        return redirect('/weight_logs');
    }

    public function export(Request $request)
    {
        $query = WeightLog::query();

        $query = $this->getSearchQuery($request, $query);

        $csvData = $query->get()->toArray();

        $csvHeader = [
            'id', 'user_id', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail', 'created_at', 'updated_at'
        ];

        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $createCsvFile = fopen('php://output', 'w');

            mb_convert_variables('SJIS-win', 'UTF-8', $csvHeader);

            fputcsv($createCsvFile, $csvHeader);

            foreach ($csvData as $csv) {
                $csv['created_at'] = Date::make($csv['created_at'])->setTimezone('Asia/Tokyo')->format('Y/m/d H:i:s');
                $csv['updated_at'] = Date::make($csv['updated_at'])->setTimezone('Asia/Tokyo')->format('Y/m/d H:i:s');
                fputcsv($createCsvFile, $csv);
            }

            fclose($createCsvFile);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="WeightLogss.csv"',
        ]);

        return $response;
    }

    private function getSearchQuery($request, $query)
    {
        if(!empty($request->keyword)) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }

        if (!empty($request->gender)) {
            $query->where('gender', '=', $request->gender);
        }

        if (!empty($request->user_id)) {
            $query->where('user_id', '=', $request->user_id);
        }

        if (!empty($request->date)) {
            $query->whereDate('created_at', '=', $request->date);
        }

        return $query;
    }

    public function postUpdate(Request $request)
    {
        return view('log');
    }

    public function postCreate()
    {
        return view('postCreate');
    }
}
