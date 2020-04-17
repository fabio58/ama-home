<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('cities')->name('cities/')->group(static function() {
            Route::get('/',                                             'CitiesController@index')->name('index');
            Route::get('/create',                                       'CitiesController@create')->name('create');
            Route::post('/',                                            'CitiesController@store')->name('store');
            Route::get('/{city}/edit',                                  'CitiesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CitiesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{city}',                                      'CitiesController@update')->name('update');
            Route::delete('/{city}',                                    'CitiesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('contact-methods')->name('contact-methods/')->group(static function() {
            Route::get('/',                                             'ContactMethodsController@index')->name('index');
            Route::get('/create',                                       'ContactMethodsController@create')->name('create');
            Route::post('/',                                            'ContactMethodsController@store')->name('store');
            Route::get('/{contactMethod}/edit',                         'ContactMethodsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ContactMethodsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{contactMethod}',                             'ContactMethodsController@update')->name('update');
            Route::delete('/{contactMethod}',                           'ContactMethodsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('disabilities')->name('disabilities/')->group(static function() {
            Route::get('/',                                             'DisabilitiesController@index')->name('index');
            Route::get('/create',                                       'DisabilitiesController@create')->name('create');
            Route::post('/',                                            'DisabilitiesController@store')->name('store');
            Route::get('/{disability}/edit',                            'DisabilitiesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DisabilitiesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{disability}',                                'DisabilitiesController@update')->name('update');
            Route::delete('/{disability}',                              'DisabilitiesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('diseases')->name('diseases/')->group(static function() {
            Route::get('/',                                             'DiseasesController@index')->name('index');
            Route::get('/create',                                       'DiseasesController@create')->name('create');
            Route::post('/',                                            'DiseasesController@store')->name('store');
            Route::get('/{disease}/edit',                               'DiseasesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DiseasesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{disease}',                                   'DiseasesController@update')->name('update');
            Route::delete('/{disease}',                                 'DiseasesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('education-levels')->name('education-levels/')->group(static function() {
            Route::get('/',                                             'EducationLevelsController@index')->name('index');
            Route::get('/create',                                       'EducationLevelsController@create')->name('create');
            Route::post('/',                                            'EducationLevelsController@store')->name('store');
            Route::get('/{educationLevel}/edit',                        'EducationLevelsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EducationLevelsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{educationLevel}',                            'EducationLevelsController@update')->name('update');
            Route::delete('/{educationLevel}',                          'EducationLevelsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('states')->name('states/')->group(static function() {
            Route::get('/',                                             'StatesController@index')->name('index');
            Route::get('/create',                                       'StatesController@create')->name('create');
            Route::post('/',                                            'StatesController@store')->name('store');
            Route::get('/{state}/edit',                                 'StatesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StatesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{state}',                                     'StatesController@update')->name('update');
            Route::delete('/{state}',                                   'StatesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('statuses')->name('statuses/')->group(static function() {
            Route::get('/',                                             'StatusesController@index')->name('index');
            Route::get('/create',                                       'StatusesController@create')->name('create');
            Route::post('/',                                            'StatusesController@store')->name('store');
            Route::get('/{status}/edit',                                'StatusesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StatusesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{status}',                                    'StatusesController@update')->name('update');
            Route::delete('/{status}',                                  'StatusesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('questionnaire-types')->name('questionnaire-types/')->group(static function() {
            Route::get('/',                                             'QuestionnaireTypesController@index')->name('index');
            Route::get('/create',                                       'QuestionnaireTypesController@create')->name('create');
            Route::post('/',                                            'QuestionnaireTypesController@store')->name('store');
            Route::get('/{questionnaireType}/edit',                     'QuestionnaireTypesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'QuestionnaireTypesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{questionnaireType}',                         'QuestionnaireTypesController@update')->name('update');
            Route::delete('/{questionnaireType}',                       'QuestionnaireTypesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('applicant-relationships')->name('applicant-relationships/')->group(static function() {
            Route::get('/',                                             'ApplicantRelationshipsController@index')->name('index');
            Route::get('/create',                                       'ApplicantRelationshipsController@create')->name('create');
            Route::post('/',                                            'ApplicantRelationshipsController@store')->name('store');
            Route::get('/{applicantRelationship}/edit',                 'ApplicantRelationshipsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ApplicantRelationshipsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{applicantRelationship}',                     'ApplicantRelationshipsController@update')->name('update');
            Route::delete('/{applicantRelationship}',                   'ApplicantRelationshipsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('applicants')->name('applicants/')->group(static function() {
            
            Route::get('/',                                             'ApplicantsController@index')->name('index');
            Route::get('/viewatc',                                      'ApplicantsController@viewatc')->name('viewatc');
            Route::get('/create',                                       'ApplicantsController@create')->name('create');
            Route::get('/find',                                         'ApplicantsController@find')->name('find');
            Route::post('/',                                            'ApplicantsController@store')->name('store');
            Route::get('/{applicant}/edit',                             'ApplicantsController@edit')->name('edit');
            Route::get('/{applicant}/show',                             'ApplicantsController@show')->name('show');
            Route::get('/{applicant}/detailsmembers',                   'ApplicantsController@detailsmembers')->name('detailsmembers');
            Route::get('/{applicant}/documentsatc',                     'ApplicantsController@documentsatc')->name('documentsatc');
            Route::post('/bulk-destroy',                                'ApplicantsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{applicant}',                                 'ApplicantsController@update')->name('update');
            Route::delete('/{applicant}',                               'ApplicantsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('questionnaire-templates')->name('questionnaire-templates/')->group(static function() {
            Route::get('/',                                             'QuestionnaireTemplatesController@index')->name('index');
            Route::get('/create',                                       'QuestionnaireTemplatesController@create')->name('create');
            Route::post('/',                                            'QuestionnaireTemplatesController@store')->name('store');
            Route::get('/{questionnaireTemplate}/edit',                 'QuestionnaireTemplatesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'QuestionnaireTemplatesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{questionnaireTemplate}',                     'QuestionnaireTemplatesController@update')->name('update');
            Route::delete('/{questionnaireTemplate}',                   'QuestionnaireTemplatesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('applicant-statuses')->name('applicant-statuses/')->group(static function() {
            Route::get('/',                                             'ApplicantStatusesController@index')->name('index');
            Route::get('/create',                                       'ApplicantStatusesController@create')->name('create');
            Route::get('/find',                                         'ApplicantStatusesController@find')->name('find');
            Route::post('/',                                            'ApplicantStatusesController@store')->name('store');
            Route::get('/{applicantStatus}/edit',                       'ApplicantStatusesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ApplicantStatusesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{applicantStatus}',                           'ApplicantStatusesController@update')->name('update');
            Route::delete('/{applicantStatus}',                         'ApplicantStatusesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('applicant-documents')->name('applicant-documents/')->group(static function() {
            Route::get('/',                                             'ApplicantDocumentsController@index')->name('index');
            Route::get('/{applicant}/{type}/create',                           'ApplicantDocumentsController@create')->name('create');
            Route::post('/',                                            'ApplicantDocumentsController@store')->name('store');
            Route::get('/{applicantDocument}/edit',                     'ApplicantDocumentsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ApplicantDocumentsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{applicantDocument}',                         'ApplicantDocumentsController@update')->name('update');
            Route::delete('/{applicantDocument}',                       'ApplicantDocumentsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('applicant-answers')->name('applicant-answers/')->group(static function() {
            Route::get('/',                                             'ApplicantAnswersController@index')->name('index');
            Route::get('/{applicant}/create',                           'ApplicantAnswersController@create')->name('create');
            Route::post('/',                                            'ApplicantAnswersController@store')->name('store');
            Route::get('/{applicantAnswer}/edit',                       'ApplicantAnswersController@edit')->name('edit');
            Route::get('/{applicantQuestionnaire}/{applicant}/show',    'ApplicantAnswersController@show')->name('show');
            Route::post('/bulk-destroy',                                'ApplicantAnswersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{applicantAnswer}',                           'ApplicantAnswersController@update')->name('update');
            Route::delete('/{applicantAnswer}',                         'ApplicantAnswersController@destroy')->name('destroy');
        });
    });
});