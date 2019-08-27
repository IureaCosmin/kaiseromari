<?php

namespace App\Http\Controllers;
use App\Volunteering;
use Illuminate\Http\Request;

class VolunteeringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $volunteerings = Volunteering::all();
        return view('admin.volunteering.index', compact('volunteerings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.volunteering.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($_POST['state'])) {
            $state = "open";
          } else {
            $state = "closed";
          }

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $volunteering = new Volunteering;

        $array = array_merge([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
        ], ['state' => $state]);

        $volunteering->create($array);

        return redirect(route('volunteering.index'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteering $volunteering)
    {
        $volunteering->delete();
        return redirect(route('volunteering.index'));
    }
}
