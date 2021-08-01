<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //ViewTabel
    public function index()
    {
        $data = Employee::all();
        return view('data_pegawai', compact('data'));
    }

    //View Add Data
    public function addData()
    {
        return view('add_data');
    }

    //Add Data
    public function insertData(Request $request)
    {
        $data = Employee::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto/' . $data->id, $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', 'Data Berhasil di Tambahkan');
    }

    //Delete Data
    public function deleteData($id)
    {
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data Berhasil di Hapus');
    }

    // View Update Data
    public function viewUpdate($id)
    {
        $data = Employee::find($id);
        return view('view_update', compact('data'));
    }

    //Update Data
    public function updateData(Request $request, $id)
    {
        $data = Employee::find($id);
        $data->update($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto/' . $data->id, $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', 'Data Berhasil di Edit');
    }
}
