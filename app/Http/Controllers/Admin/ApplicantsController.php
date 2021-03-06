<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Applicant\BulkDestroyApplicant;
use App\Http\Requests\Admin\Applicant\DestroyApplicant;
use App\Http\Requests\Admin\Applicant\IndexApplicant;
use App\Http\Requests\Admin\Applicant\StoreApplicant;
use App\Http\Requests\Admin\Applicant\UpdateApplicant;
use App\Http\Requests\Admin\Applicant\FindApplicant;
use App\Models\Applicant;
use App\Models\ContactMethod;
use App\Models\Disability;
use App\Models\Disease;
use App\Models\EducationLevel;
use App\Models\City;
use App\Models\State;
use App\Models\ApplicantStatus;
use App\Models\ApplicantQuestionnaire;
use App\Models\QuestionnaireTemplateQuestion;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use GuzzleHttp\Psr7\Request;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
Use Session;


class ApplicantsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexApplicant $request
     * @return array|Factory|View
     */
    public function index(IndexApplicant $request)
    {
        //return $request;
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Applicant::class)->processRequestAndGet(
            // pass the request with params
            $request,
           
            // set columns to query
            ['id', 'names', 'last_names', 'birthdate', 'gender', 'state_id', 'city_id', 'education_level', 'government_id', 'marital_status', 'pregnant', 'pregnancy_due_date', 'parent_applicant', 'applicant_relationship', 'cadaster', 'property_id', 'occupation', 'monthly_income'],

            // set columns to searchIn
            ['id', 'names', 'last_names', 'gender', 'government_id', 'marital_status', 'cadaster', 'property_id', 'occupation'],
            function ($query) use ($request) {
                //dd($query);
            //  dd ($request->get('city'));
                $query->with(['city']);
                if($request->has('cities')){
                    $query->whereIn('city_id', $request->get('cities'));
                }
                $query->with(['state']);
                if($request->has('states')){
                    $query->whereIn('state_id', $request->get('states'));
                }
                $query->with(['educationLevel']);
                if($request->has('educationlevels')){
                    $query->whereIn('education_level', $request->get('educationlevels'));
                }
                $query->with(['applicant']);
                if($request->has('monthly_income')){
                    $query->whereIn('education_level', $request->get('educationlevels'));
                }
               $query->whereNull('applicant_relationship');
            
           
        
            });
            
        //return $data;

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.applicant.index', 
        ['data' => $data,  
        'cities' => City::all(),
        'states' => State::all(),
        'educationLevel' => EducationLevel::all()
        ]
    
    );
    }
    public function viewAtc(IndexApplicant $request)
    {
        //return $request;
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Applicant::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'names', 'last_names', 'birthdate', 'gender', 'state_id', 'city_id', 'education_level', 'government_id', 'marital_status', 'pregnant', 'pregnancy_due_date', 'parent_applicant', 'applicant_relationship', 'cadaster', 'property_id', 'occupation', 'monthly_income'],

            // set columns to searchIn
            ['id', 'names', 'last_names', 'gender', 'government_id', 'marital_status', 'cadaster', 'property_id', 'occupation'],
         
            function ($query) use ($request) {
                $query->with(['city']);
                if($request->has('cities')){
                    $query->whereIn('city_id', $request->get('cities'));
                }
                $query->with(['state']);
                if($request->has('states')){
                    $query->whereIn('state_id', $request->get('states'));
                }
                $query->with(['educationLevel']);
                if($request->has('educationlevels')){
                    $query->whereIn('education_level', $request->get('educationlevels'));
                }
                $query->with(['applicant']);
                if($request->has('applicants')){
                    $query->whereIn('parent_applicant', $request->get('applicants'));
                }
        
            }

         
        );
        //  return $data;

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.applicant.viewAtc', 
        ['data' => $data,  
        'cities' => City::all(),
        'states' => State::all(),
        'educationLevel' => EducationLevel::all()
        ]
    
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.applicant.create');

        $educationSelect = EducationLevel::all();
        $diseaseSelect = Disease::all();;
        $disabilitySelect = Disability::all();
        $contactMethodSelect = ContactMethod::all();
        return view('admin.applicant.create', compact('educationSelect', 'diseaseSelect', 'disabilitySelect', 'contactMethodSelect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreApplicant $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // $this->authorize('admin.applicant.store' , $request); 
        // Sanitize input
        //$sanitized = $request->getSanitized();
        
        $sanitized['education_level'] = $request->getEducationLevelId();
        $sanitized['user_id'] = $request->userId;
        
        //$sanitized['documents'] = $request->documents();
        // Store the Applicant
        $applicant = Applicant::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/applicants'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/applicants');
    }

    /**
     * Display the specified resource.
     *
     * @param Applicant $applicant
     * @throws AuthorizationException
     * @return void
     */
    public function show(Applicant $applicant)
    {
        $this->authorize('admin.applicant.show', $applicant);

        $educationSelect = EducationLevel::all();
        $diseaseSelect = Disease::all();;
        $disabilitySelect = Disability::all();
        $contactMethodSelect = ContactMethod::all();
        $postulante=applicant::find($applicant->id);
        $questions=$postulante->find(1)->applicantQuestionnaires->find(1)->applicantAnswers;
        //return $questions;
      
        

        return view('admin.applicant.show', compact('questions','postulante','educationSelect', 'diseaseSelect', 'disabilitySelect', 'contactMethodSelect'));
    }
    public function detailsmembers(Applicant $applicant)
    {
        $this->authorize('admin.applicant.show', $applicant);

        $applicants=Applicant::where('id','=',$applicant->id)->with('state')->get()->toArray();
        // return ($applicants);
      
        $details=applicant::where('parent_applicant','=',$applicant->id)->with('applicantRelationship')->get()->toArray();
      
      
        

        return view('admin.applicant.detailsmembers', compact('applicants', 'details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Applicant $applicant
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Applicant $applicant)
    {
        $this->authorize('admin.applicant.edit', $applicant);

        $educationSelect = EducationLevel::all();
        $diseaseSelect = Disease::all();;
        $disabilitySelect = Disability::all();
        $contactMethodSelect = ContactMethod::all();

        return view('admin.applicant.edit', [
            'applicant' => $applicant,
            'educationLevels' => $educationSelect,
            'diseases' => $diseaseSelect,
            'disabilities' => $disabilitySelect,
            'contactMethods' => $contactMethodSelect
        ]);
    }
    public function documentsatc(Applicant $applicant)
    {
        //$this->authorize('admin.applicant.documentsatc', $applicant);
        //$user = Applicant::guard('api')->user();

        $educationSelect = EducationLevel::all();
        $diseaseSelect = Disease::all();;
        $disabilitySelect = Disability::all();
        $contactMethodSelect = ContactMethod::all();

        return view('admin.applicant.documentsatc', [
            'applicant' => $applicant,
            'educationLevels' => $educationSelect,
            'diseases' => $diseaseSelect,
            'disabilities' => $disabilitySelect,
            'contactMethods' => $contactMethodSelect
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateApplicant $request
     * @param Applicant $applicant
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateApplicant $request, Applicant $applicant)
    {
       // dd($request);
        
        // Sanitize input
        //$sanitized = $request->getSanitized();

        $sanitized['education_level'] = $request->getEducationLevelId();

        // Update changed values Applicant
        $applicant->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/applicants'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/applicants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyApplicant $request
     * @param Applicant $applicant
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyApplicant $request, Applicant $applicant)
    {
        $applicant->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyApplicant $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyApplicant $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Applicant::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

     /**
     * Display a listing of the resource.
     *
     * @param IndexApplicant $request
     * @return array|Factory|View
     */
    public function find(FindApplicant $request)
    {

        //dd($request->q);
        if(!empty($request->q)){

        
                $data = ApplicantStatus::join("applicants","applicants.id","=","applicant_statuses.applicant_id")
                ->join("cities", "cities.id", "applicants.city_id")
                ->join("states", "states.id", "applicants.state_id")
                ->join("statuses", "statuses.id", "applicant_statuses.status_id")
                ->where('applicants.government_id','=',$request->q)
                ->select("applicant_statuses.*", "cities.name as city","states.name as states", "applicants.*", "statuses.name as status" )
                ->get();
                //return count($data);
                if(count($data)==0){
                    ///dd("tirando mensjae");
                    
                    return redirect('admin/applicants/find')->with('error','No se ha encontrado postulantes con el Numero de Cedula ingresado');
                }
                //return $data;
                return view('admin.applicant.find', [
                'data' => $data
                ]);
        }else{
            return view('admin.applicant.find', $request);

        }

        
       //return view('procedures.create');
    }
}
