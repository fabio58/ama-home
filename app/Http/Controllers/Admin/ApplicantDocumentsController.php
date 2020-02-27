<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ApplicantDocument\BulkDestroyApplicantDocument;
use App\Http\Requests\Admin\ApplicantDocument\DestroyApplicantDocument;
use App\Http\Requests\Admin\ApplicantDocument\IndexApplicantDocument;
use App\Http\Requests\Admin\ApplicantDocument\StoreApplicantDocument;
use App\Http\Requests\Admin\ApplicantDocument\UpdateApplicantDocument;
use App\Models\ApplicantDocument;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use App\Models\Applicant;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ApplicantDocumentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexApplicantDocument $request
     * @return array|Factory|View
     */
    public function index(IndexApplicantDocument $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ApplicantDocument::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'applicant_id', 'document_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.applicant-document.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create(Applicant $Applicant)
    {
        //return $Applicant;
        $applicant=Applicant::all();
        //$disabilitySelect = Disability::all();
        $this->authorize('admin.applicant-document.create');

        return view('admin.applicant-document.create', ['applicant' => $applicant]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreApplicantDocument $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreApplicantDocument $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ApplicantDocument
        $applicantDocument = ApplicantDocument::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/applicant-documents'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/applicant-documents');
    }

    /**
     * Display the specified resource.
     *
     * @param ApplicantDocument $applicantDocument
     * @throws AuthorizationException
     * @return void
     */
    public function show(ApplicantDocument $applicantDocument)
    {
        $this->authorize('admin.applicant-document.show', $applicantDocument);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ApplicantDocument $applicantDocument
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ApplicantDocument $applicantDocument)
    {
        $this->authorize('admin.applicant-document.edit', $applicantDocument);


        return view('admin.applicant-document.edit', [
            'applicantDocument' => $applicantDocument,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateApplicantDocument $request
     * @param ApplicantDocument $applicantDocument
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateApplicantDocument $request, ApplicantDocument $applicantDocument)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ApplicantDocument
        $applicantDocument->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/applicant-documents'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/applicant-documents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyApplicantDocument $request
     * @param ApplicantDocument $applicantDocument
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyApplicantDocument $request, ApplicantDocument $applicantDocument)
    {
        $applicantDocument->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyApplicantDocument $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyApplicantDocument $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ApplicantDocument::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
