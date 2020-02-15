<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionnaireTemplate\BulkDestroyQuestionnaireTemplate;
use App\Http\Requests\Admin\QuestionnaireTemplate\DestroyQuestionnaireTemplate;
use App\Http\Requests\Admin\QuestionnaireTemplate\IndexQuestionnaireTemplate;
use App\Http\Requests\Admin\QuestionnaireTemplate\StoreQuestionnaireTemplate;
use App\Http\Requests\Admin\QuestionnaireTemplate\UpdateQuestionnaireTemplate;
use App\Models\QuestionnaireTemplate;
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

class QuestionnaireTemplatesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexQuestionnaireTemplate $request
     * @return array|Factory|View
     */
    public function index(IndexQuestionnaireTemplate $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(QuestionnaireTemplate::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'enabled', 'questionnaire_type_id'],

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

        return view('admin.questionnaire-template.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.questionnaire-template.create');

        return view('admin.questionnaire-template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreQuestionnaireTemplate $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreQuestionnaireTemplate $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the QuestionnaireTemplate
        $questionnaireTemplate = QuestionnaireTemplate::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/questionnaire-templates'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/questionnaire-templates');
    }

    /**
     * Display the specified resource.
     *
     * @param QuestionnaireTemplate $questionnaireTemplate
     * @throws AuthorizationException
     * @return void
     */
    public function show(QuestionnaireTemplate $questionnaireTemplate)
    {
        $this->authorize('admin.questionnaire-template.show', $questionnaireTemplate);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param QuestionnaireTemplate $questionnaireTemplate
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(QuestionnaireTemplate $questionnaireTemplate)
    {
        $this->authorize('admin.questionnaire-template.edit', $questionnaireTemplate);


        return view('admin.questionnaire-template.edit', [
            'questionnaireTemplate' => $questionnaireTemplate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateQuestionnaireTemplate $request
     * @param QuestionnaireTemplate $questionnaireTemplate
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateQuestionnaireTemplate $request, QuestionnaireTemplate $questionnaireTemplate)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values QuestionnaireTemplate
        $questionnaireTemplate->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/questionnaire-templates'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/questionnaire-templates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyQuestionnaireTemplate $request
     * @param QuestionnaireTemplate $questionnaireTemplate
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyQuestionnaireTemplate $request, QuestionnaireTemplate $questionnaireTemplate)
    {
        $questionnaireTemplate->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyQuestionnaireTemplate $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyQuestionnaireTemplate $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    QuestionnaireTemplate::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
