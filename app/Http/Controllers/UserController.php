<?php

namespace App\Http\Controllers;

use App\Models\organizationModel;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = organizationModel::select('*');



            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('sale-tools', function($row){

                    return ' <div class="text-center">
                              <span >-</span
                             </div>';
                })

                ->addColumn('action', function($row){

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">BLOCK</a>';

                    return $btn;
                })
                ->rawColumns(['action','sale-tools'])
                ->make(true);

            return view('super-admin.view-organization');
        }


    }
}
