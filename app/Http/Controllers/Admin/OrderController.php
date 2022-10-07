<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Order::whenSearch(request()->search)
            ->orderBy('id', 'Desc')
            ->with('category', 'user')
            ->paginate(10);

        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jobs.create')->with([
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(Order::$rules);

        Order::create($validatedData);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', __('jobs.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $job)
    {
        return view('admin.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $job)
    {
        return view('admin.jobs.edit')->with([
            'job' => $job,
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $job)
    {
        $validatedData = $request->validate(Order::$rules);

        $validatedData = array_filter($validatedData);

        $job->update($validatedData);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', __('jobs.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ids = !empty($request->ids)
            ? $request->ids
            : [$id];

            Order::destroy($ids);

        if (request()->wantsJson())
            return \Response::json([
                'success' => true,
                'message' => __('jobs.deleted'),
                'data' => [
                    'ids' => $ids
                ]
            ], 200);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', __('jobs.deleted'));
    }
}
