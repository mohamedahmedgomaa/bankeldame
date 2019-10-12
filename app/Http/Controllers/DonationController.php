<?php

namespace App\Http\Controllers;

use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = DonationRequest::paginate(20);
        return view('donations.index', compact('records'));
    }

    public function show($id)
    {
        //
        $donations = DonationRequest::findOrFail($id);
        return view('donations.show', compact('donations'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = DonationRequest::findOrFail($id);
        $record->delete();
        flash()->success('تم الحذف بنجاح');
        return back();
    }
}
