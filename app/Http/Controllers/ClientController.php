<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Client::paginate(20);
        return view('clients.index', compact('records'));
    }

    public function is_active($id)
    {
        $record = Client::findOrFail($id);
        if ($record->is_active == 1) {
            $record->is_active = 0;
            $update = $record->update(['is_active' => $record->is_active]);
        } else {
            $record->is_active = 1;
            $update = $record->update(['is_active' => $record->is_active]);
        }
        return back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Client::findOrFail($id);
        $record->delete();
        flash()->success('تم الحذف بنجاح');
        return back();
    }
}
