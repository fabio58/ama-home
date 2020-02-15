<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ApplicantRelationship\BulkDestroyApplicantRelationship;
use App\Http\Requests\Admin\ApplicantRelationship\DestroyApplicantRelationship;
use App\Http\Requests\Admin\ApplicantRelationship\IndexApplicantRelationship;
use App\Http\Requests\Admin\ApplicantRelationship\StoreApplicantRelationship;
use App\Http\Requests\Admin\ApplicantRelationship\UpdateApplicantRelationship;
use App\Models\ApplicantRelationship;
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

class ApplicantRelationshipsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexApplicantRelationship $request
     * @return array|Factory|View
     */
    public function index(IndexApplicantRelationship $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ApplicantRelationship::class)->processRequestAndGet(
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

        return view('admin.applicant-relationship.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.applicant-relationship.create');

        return view('admin.applicant-relationship.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreApplicantRelationship $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreApplicantRelationship $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ApplicantRelationship
        $applicantRelationship = ApplicantRelationship::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/applicant-relationships'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/applicant-relationships');
    }

    /**
     * Display the specified resource.
     *
     * @param ApplicantRelationship $applicantRelationship
     * @throws AuthorizationException
     * @return void
     */
    public function show(ApplicantRelationship $applicantRelationship)
    {
        $this->authorize('admin.applicant-relationship.show', $applicantRelationship);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ApplicantRelationship $applicantRelationship
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ApplicantRelationship $applicantRelationship)
    {
        $this->authorize('admin.applicant-relationship.edit', $applicantRelationship);


        return view('admin.applicant-relationship.edit', [
            'applicantRelationship' => $applicantRelationship,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateApplicantRelationship $request
     * @param ApplicantRelationship $applicantRelationship
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateApplicantRelationship $request, ApplicantRelationship $applicantRelationship)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ApplicantRelationship
        $applicantRelationship->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/applicant-relationships'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/applicant-relationships');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyApplicantRelationship $request
     * @param ApplicantRelationship $applicantRelationship
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyApplicantRelationship $request, ApplicantRelationship $applicantRelationship)
    {
        $applicantRelationship->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyApplicantRelationship $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyApplicantRelationship $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ApplicantRelationship::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
