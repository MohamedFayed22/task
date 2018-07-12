<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use App\Employe;
use DB;
use Session;
use Excel;

class MaatwebsiteController extends Controller
{
    public function importExport()
    {
        return view('importExport');
    }


    public function downloadExcel($type)
    {
        $data = Employe::get()->toArray();
        return Excel::create('laravelcode', function ($excel) use ($data) {
            $excel->sheet('mySheet', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }


    public function importExcel(Request $request)
    {


        $this->validate($request, array(
            'import_file'      => 'required'
        ));

        if ($request->hasFile('import_file')) {


            Excel::load($request->file('import_file')->getRealPath(), function ($reader) {

                $emails = Employe::pluck('email')->toArray();
                foreach ($reader->toArray() as $key => $row) {


                    if (!empty($row)) {
                        foreach ($row as $v) {

                            if (in_array($v['email'], $emails))
                              continue;



                            ($v['name'] !== null)        ?  $data['name'] = $v['name']                :  $data['name'] ='empty '  ;
                            ($v['job_title'] !== null)   ?  $data['job_title'] = $v['job_title']      : $data['job_title'] = 'empty ' ;
                            ($v['email'] !== null)       ?  $data['email'] = $v['email']              :  $data['email'] ='empty '  ;
                            ($v['mobile']) !== null      ?  $data['mobile'] = $v['mobile']            :  $data['mobile'] ='empty '  ;
                            ($v['nationality'] !== null) ?  $data['nationality'] = $v['nationality']  :  $data['nationality'] ='empty '  ;


                            if (!empty($data)) {
                                DB::table('employess')->insert($data);
                            }
                        }
                    }
                }
            });
        }

        Session::put('success', 'Youe file successfully import in database!!!');

        return back();
    }


}