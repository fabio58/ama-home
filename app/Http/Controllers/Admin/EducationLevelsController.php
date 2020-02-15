<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EducationLevel\BulkDestroyEducationLevel;
use App\Http\Requests\Admin\EducationLevel\DestroyEducationLevel;
use App\Http\Requests\Admin\EducationLevel\IndexEducationLevel;
use App\Http\Requests\Admin\EducationLevel\StoreEducationLevel;
use App\Http\Requests\Admin\EducationLevel\UpdateEducationLevel;
use App\Models\EducationLevel;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class EducationLevelsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEducationLevel $request
     * @return array|Factory|View
     */
    public function index(IndexEducationLevel $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(EducationLevel::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name'],

            // set columns to searchIn
            ['id', 'name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.education-level.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.education-level.create');

        return view('admin.education-level.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEducationLevel $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEducationLevel $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the EducationLevel
        $educationLevel = EducationLevel::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/education-levels'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/education-levels');
    }

    /**
     * Display the specified resource.
     *
     * @param EducationLevel $educationLevel
     * @throws AuthorizationException
     * @return void
     */
    public function show(EducationLevel $educationLevel)
    {
        $this->authorize('admin.education-level.show', $educationLevel);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EducationLevel $educationLevel
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(EducationLevel $educationLevel)
    {
        $this->authorize('admin.education-level.edit', $educationLevel);


        return view('admin.education-level.edit', [
            'educationLevel' => $educationLevel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEducationLevel $request
     * @param EducationLevel $educationLevel
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEducationLevel $request, EducationLevel $educationLevel)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values EducationLevel
        $educationLevel->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/education-levels'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/education-levels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEducationLevel $request
     * @param EducationLevel $educationLevel
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEducationLevel $request, EducationLevel $educationLevel)
    {
        $educationLevel->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEducationLevel $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEducationLevel $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    EducationLevel::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
