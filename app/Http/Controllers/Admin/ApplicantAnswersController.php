<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ApplicantAnswer\BulkDestroyApplicantAnswer;
use App\Http\Requests\Admin\ApplicantAnswer\DestroyApplicantAnswer;
use App\Http\Requests\Admin\ApplicantAnswer\IndexApplicantAnswer;
use App\Http\Requests\Admin\ApplicantAnswer\StoreApplicantAnswer;
use App\Http\Requests\Admin\ApplicantAnswer\UpdateApplicantAnswer;
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
use App\Models\ApplicantAnswer;
use App\Models\Applicant;
use App\Models\ApplicantQuestionnaire;
use App\Models\QuestionnaireTemplate;
use App\Models\QuestionnaireTemplateQuestion;

class ApplicantAnswersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexApplicantAnswer $request
     * @return array|Factory|View
     */
    public function index(IndexApplicantAnswer $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ApplicantAnswer::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'applicant_questionnaire_id', 'answer', 'extended_value', 'question_id'],

            // set columns to searchIn
            ['id', 'answer', 'extended_value']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.applicant-answer.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create(ApplicantAnswer $ApplicantAnswer, Applicant $applicant)
    {
        $this->authorize('admin.applicant-answer.create');
        
        // $questions=ApplicantQuestionnaire::with('questionnaireTemplate', 'QuestionnaireTemplate.questionnaireTemplateQuestions')
        // ->get()
        // ->toArray();
        $templateCampos=ApplicantQuestionnaire::with('questionnaireTemplate', 'QuestionnaireTemplate.questionnaireTemplateQuestions')
        ->get();

        $template=ApplicantQuestionnaire::find($applicant->id)
        ->get('quiestionnaire_template_id')
       ->pluck('quiestionnaire_template_id');
         
         
         $questions=QuestionnaireTemplateQuestion::where('questionnaire_template_id', '=', $template )->get();
        $preguntas=ApplicantQuestionnaire::where('applicant_id', '=', $applicant->id )->get()->pluck('id');
        // return $preguntas;
        $control=ApplicantAnswer::where('applicant_questionnaire_id', '=', $preguntas)->get()->toArray();
        // return ($control);
         if(count($control)>0){
            // return ['redirect' => url('admin/applicant-answer/show')];
             return redirect('admin/applicant-answers/'.$control[0]['applicant_questionnaire_id'].'/show');
         
         } 

        return view('admin.applicant-answer.create', compact('ApplicantAnswer','questions', 'applicant', 'template', 'templateCampos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreApplicantAnswer $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreApplicantAnswer $request)
    {
        //return $request;
        $allorders = QuestionnaireTemplateQuestion::where('questionnaire_template_id', '=', $request->applicant_questionnaire_id )->get();
        //   return count($allorders);
            for($i = 1;$i<=count($allorders);$i++) {
    
                $var= "template".$i;
                $var2= "q".$i."_text";
                $var1= "q".$i;
                // return $items->id;
                $sanitized = $request->getSanitized();
                $sanitized['applicant_questionnaire_id'] = $request->applicant_questionnaire_id;
                $sanitized['answer'] = $request->$var1;
                $sanitized['extended_value'] = $request->$var2;
                $sanitized['question_id'] = $request->$var;
                //  return $sanitized;
                // Store the ApplicantAnswer
                // exit();
                $applicantAnswer = ApplicantAnswer::create($sanitized); 

                
            }
   
        
        if ($request->ajax()) {
            return ['redirect' => url('admin/applicant'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/applicant-answers');
    }

    /**
     * Display the specified resource.
     *
     * @param ApplicantAnswer $applicantAnswer
     * @throws AuthorizationException
     * @return void
     */
    public function show(ApplicantAnswer $applicantAnswer, ApplicantQuestionnaire $applicantQuestionnaire)
    {
        $this->authorize('admin.applicant-answer.show', $applicantAnswer);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ApplicantAnswer $applicantAnswer
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ApplicantAnswer $applicantAnswer)
    {
        $this->authorize('admin.applicant-answer.edit', $applicantAnswer);


        return view('admin.applicant-answer.edit', [
            'applicantAnswer' => $applicantAnswer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateApplicantAnswer $request
     * @param ApplicantAnswer $applicantAnswer
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateApplicantAnswer $request, ApplicantAnswer $applicantAnswer)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ApplicantAnswer
        $applicantAnswer->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/applicant-answers'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/applicant-answers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyApplicantAnswer $request
     * @param ApplicantAnswer $applicantAnswer
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyApplicantAnswer $request, ApplicantAnswer $applicantAnswer)
    {
        $applicantAnswer->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyApplicantAnswer $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyApplicantAnswer $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ApplicantAnswer::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
