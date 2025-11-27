<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoriesController extends Controller
{
    /* public function __construct()
    {
        Gate::authorize('admin-gate');
    } */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = session('page',null);
        $perPage = 3;
        if($page != null && $page=='last'){
            $page = ceil(Category::count()/$perPage);
        }
        $paginated = Category::paginate($perPage, page: $page);
        return view('categories.index',['categories'=>$paginated]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('admin-gate');
        $validated = $request->validate([
            'name'=>'required'
        ]);
        Category::create($validated);
        $request->session()->flash('page','last');
        return redirect(route('categories.index'))->with('status','Category is added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name'=>'required'
        ]);
        $category->update($validated);
        return redirect(route('categories.index'))->with('status','Category is updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
