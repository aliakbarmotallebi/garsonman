<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;
use File;
use QrCode;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::latest()->paginate(7);
        return view('dashboard.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|numeric|unique:tables|max:255',
        ]);


        $generator = Table::getTokenGenerate();
        $path = public_path('/qrcodes');

        if($generator){

            if (! File::exists($path)) {
                File::makeDirectory($path);
            }

            $name = ($path ."/". $generator . ".svg");

            QrCode::size(300)->generate( url('/') . '?' . http_build_query(['table' => $generator ]), $name);

            $table = Table::create([
                'number' => request('number'),
                'qrcode' => sprintf("qrcodes/%s.svg", $generator),
                'token'  => $generator
            ]);

            if($table instanceof Table)
                alert()->success('با موفقیت ایجاد شد!');

            return redirect()->route('dashboard.tables.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        return view('dashboard.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        $request->validate([
            'number' => 'required|numeric|unique:tables|max:255',
        ]);

        $table = $table->update([
            'number' => request('number'),
        ]);

        if($table )
            alert()->success('با موفقیت ویرایش شد!');

        return redirect()->route('dashboard.tables.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        $table->delete();
        alert()->info('با موفقیت حذف شد!');
        return redirect()->route('dashboard.tables.index');
    }
}
