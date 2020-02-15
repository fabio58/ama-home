<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionnaireType\BulkDestroyQuestionnaireType;
use App\Http\Requests\Admin\QuestionnaireType\DestroyQuestionnaireType;
use App\Http\Requests\Admin\QuestionnaireType\IndexQuestionnaireType;
use App\Http\Requests\Admin\QuestionnaireType\StoreQuestionnaireType;
use App\Http\Requests\Admin\QuestionnaireType\UpdateQuestionnaireType;
use App\Models\QuestionnaireType;
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

class QuestionnaireTypesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexQuestionnaireType $request
     * @return array|Factory|View
     */
    public function index(IndexQuestionnaireType $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(QuestionnaireType::class)->processRequestAndGet(
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

        return view('admin.questionnaire-type.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.questionnaire-type.create');

        return view('admin.questionnaire-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreQuestionnaireType $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreQuestionnaireType $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the QuestionnaireType
        $questionnaireType = QuestionnaireType::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/questionnaire-types'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/questionnaire-types');
    }

    /**
     * Display the specified resource.
     *
     * @param QuestionnaireType $questionnaireType
     * @throws AuthorizationException
     * @return void
     */
    public function show(QuestionnaireType $questionnaireType)
    {
        $this->authorize('admin.questionnaire-type.show', $questionnaireType);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param QuestionnaireType $questionnaireType
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(QuestionnaireType $questionnaireType)
    {
        $this->authorize('admin.questionnaire-type.edit', $questionnaireType);


        return view('admin.questionnaire-type.edit', [
            'questionnaireType' => $questionnaireType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateQuestionnaireType $request
     * @param QuestionnaireType $questionnaireType
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateQuestionnaireType $request, QuestionnaireType $questionnaireType)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values QuestionnaireType
        $questionnaireType->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/questionnaire-types'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/questionnaire-types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyQuestionnaireType $request
     * @param QuestionnaireType $questionnaireType
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyQuestionnaireType $request, QuestionnaireType $questionnaireType)
    {
        $questionnaireType->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyQuestionnaireType $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyQuestionnaireType $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    QuestionnaireType::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
