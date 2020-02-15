<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Disability\BulkDestroyDisability;
use App\Http\Requests\Admin\Disability\DestroyDisability;
use App\Http\Requests\Admin\Disability\IndexDisability;
use App\Http\Requests\Admin\Disability\StoreDisability;
use App\Http\Requests\Admin\Disability\UpdateDisability;
use App\Models\Disability;
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

class DisabilitiesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDisability $request
     * @return array|Factory|View
     */
    public function index(IndexDisability $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Disability::class)->processRequestAndGet(
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

        return view('admin.disability.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.disability.create');

        return view('admin.disability.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDisability $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDisability $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Disability
        $disability = Disability::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/disabilities'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/disabilities');
    }

    /**
     * Display the specified resource.
     *
     * @param Disability $disability
     * @throws AuthorizationException
     * @return void
     */
    public function show(Disability $disability)
    {
        $this->authorize('admin.disability.show', $disability);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Disability $disability
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Disability $disability)
    {
        $this->authorize('admin.disability.edit', $disability);


        return view('admin.disability.edit', [
            'disability' => $disability,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDisability $request
     * @param Disability $disability
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDisability $request, Disability $disability)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Disability
        $disability->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/disabilities'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/disabilities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDisability $request
     * @param Disability $disability
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDisability $request, Disability $disability)
    {
        $disability->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDisability $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDisability $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Disability::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
