<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ContentController extends Controller
{
   
    public function index()
    {
        $data = [];

        return view('content.index', compact('data'))->with('i', (request()->input('page', 1)-1) * 5);
    }
    public function create(Request $request)
    {   
        $type_list = [
			'publicize' => 'ข่าวประชาสัมพันธ์',
			'context' => 'บทความ',
			'plant' => 'พืช',
			'animal' => 'สัตว์',
			'fungi' => 'จุลินทรีย์และฟังไจ',
			'land' => 'ธรณี',
			'culture' => 'ศิลปวัฒนธรรม',
			'learning' => 'งานส่งเสริมการเรียนรู้',
			'project' => 'งานกิจกรรมโครงการ',
			'online' => 'งานบริการออนไลน์',
		];
		$type = $request['type'];
		$type_text = isset($type_list[$type])? $type_list[$type] :'' ;
        if(isset($_REQUEST['id'])) {
            $data =	[
                    'id' => 2,
                    'title_th' => 'STeP นำทัพนักศึกษา มช. กวาดรางวัล Startup Thailand League 2021 (ภาคเหนือ) คว้าชัยชนะแบบจัดเต็ม พร้อมเดินหน้าคว้าชัยเวทีระดับประเทศในเดือนสิงหาคมนี้',
                    'title_en' => 'STeP',
                    'description_th' => 'Mocup',
                    'description_en' => 'Mocup',
                ];
            return view('content.edit', compact('type', 'type_text', 'data'));
        } else {
            return view('content.create', compact('type', 'type_text'));
        }
    }

    public function viewContet(Request $request)
	{
		
        var_dump($request['title_th']);
        die();
	    // return redirect('/admin');
	}

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required'
        // ]);{{url('/admin/content?type=publicize')}}

        // Content::create($request->all());
        return redirect('/admin')
                         ->with('success', 'Created successfully');
    }

   
    public function show(Content $content)
    {
        return view('content.create');
    }

    
    public function edit(Request $request)
    {
        return view('content.edit');

    }

  
    public function update(Request $request, Content $content)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required'
        // ]);
        // $content->update($request->all());
        return redirect()->route('/admin')
                        ->with('SUCCESS', 'Updated successfully');

    }

   
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('content.index')
                        >with('SUCCESS', 'Deleted successfully');
    }
}
