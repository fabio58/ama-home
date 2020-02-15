<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Disease\BulkDestroyDisease;
use App\Http\Requests\Admin\Disease\DestroyDisease;
use App\Http\Requests\Admin\Disease\IndexDisease;
use App\Http\Requests\Admin\Disease\StoreDisease;
use App\Http\Requests\Admin\Disease\UpdateDisease;
use App\Models\Disease;
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

class DiseasesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDisease $request
     * @return array|Factory|View
     */
    public function index(IndexDisease $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Disease::class)->processRequestAndGet(
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

        return view('admin.disease.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.disease.create');

        return view('admin.disease.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDisease $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDisease $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Disease
        $disease = Disease::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/diseases'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/diseases');
    }

    /**
     * Display the specified resource.
     *
     * @param Disease $disease
     * @throws AuthorizationException
     * @return void
     */
    public function show(Disease $disease)
    {
        $this->authorize('admin.disease.show', $disease);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Disease $disease
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Disease $disease)
    {
        $this->authorize('admin.disease.edit', $disease);


        return view('admin.disease.edit', [
            'disease' => $disease,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDisease $request
     * @param Disease $disease
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDisease $request, Disease $disease)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Disease
        $disease->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/diseases'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/diseases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDisease $request
     * @param Disease $disease
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDisease $request, Disease $disease)
    {
        $disease->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDisease $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDisease $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Disease::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
