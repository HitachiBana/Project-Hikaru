<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = DB::table('tb_m_project')
            ->join ('tb_m_client','tb_m_client.client_id', '=','tb_m_project.client_id')
            ->when(strlen($katakunci), function($query) use ($katakunci)
            {
                return $query->where("project_name", "like", "$katakunci");
            })
            ->paginate($jumlahbaris);
        }else{
            $data = DB::table('tb_m_project')
            ->join ('tb_m_client','tb_m_client.client_id', '=','tb_m_project.client_id')
            // ->select('tb_m_project.project_name', 'tb_m_client.client_name', 'tb_m_project.project_start', 'tb_m_project.project_end', 'tb_m_project.project_status')
            ->paginate($jumlahbaris);
        }
        return view('mini-project.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data2 = DB::table('tb_m_client')
        ->get();

        return view('mini-project.insert')->with('data2', $data2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('p_name', $request->p_name);
        Session::flash('p_start', $request->p_start);
        Session::flash('p_end', $request->p_end);

        $request->validate([
            'p_name'=>'required',
            'client'=>'required',
            'p_start'=>'required',
            'p_end'=>'required',
            'status'=>'required',
        ],[
            'p_name.required'=>'Project Name Wajib Diisi',
            'client.required'=>'Silahkan Masukan Client',
            'p_start.required'=>'Tentukan Tanggal Project Mulai',
            'p_end.required'=>'Tentukan Tanggal Project Selesai',
            'status.required'=>'Tentukan Status Project',
        ]);
        $data = [
            'project_name' => $request->p_name,
            'client_id' => $request->client,
            'project_start' => $request->p_start,
            'project_end' => $request->p_end,
            'project_status' => $request->status,
        ];
        project::create($data);
        return redirect()->to('project')->with('success', 'Data Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = project::where('project_id',$id)->first();
        $data2 = DB::table('tb_m_client')->get();
        //dd($data);
        return view('mini-project.edit',compact('data','data2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'p_name'=>'required',
            'client'=>'required',
            'p_start'=>'required',
            'p_end'=>'required',
            'status'=>'required',
        ],[
            'p_name.required'=>'Project Name Wajib Diisi',
            'client.required'=>'Silahkan Masukan Client',
            'p_start.required'=>'Tentukan Tanggal Project Mulai',
            'p_end.required'=>'Tentukan Tanggal Project Selesai',
            'status.required'=>'Tentukan Status Project',
        ]);
        $data = [
            'project_name' => $request->p_name,
            'client_id' => $request->client,
            'project_start' => $request->p_start,
            'project_end' => $request->p_end,
            'project_status' => $request->status,
        ];
        project::where('project_id',$id)->update($data);
        return redirect()->to('project')->with('success', 'Data Telah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $selectedItemIds = $request->input('item_ids', []);

        project::whereIn('project_id', $selectedItemIds)->delete();

        return response()->json(['message' => 'Item Yang Dipilih Telah Dihapus']);
    }
}
