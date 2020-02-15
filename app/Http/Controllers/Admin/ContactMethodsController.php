<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactMethod\BulkDestroyContactMethod;
use App\Http\Requests\Admin\ContactMethod\DestroyContactMethod;
use App\Http\Requests\Admin\ContactMethod\IndexContactMethod;
use App\Http\Requests\Admin\ContactMethod\StoreContactMethod;
use App\Http\Requests\Admin\ContactMethod\UpdateContactMethod;
use App\Models\ContactMethod;
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

class ContactMethodsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexContactMethod $request
     * @return array|Factory|View
     */
    public function index(IndexContactMethod $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ContactMethod::class)->processRequestAndGet(
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

        return view('admin.contact-method.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.contact-method.create');

        return view('admin.contact-method.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreContactMethod $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreContactMethod $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ContactMethod
        $contactMethod = ContactMethod::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/contact-methods'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/contact-methods');
    }

    /**
     * Display the specified resource.
     *
     * @param ContactMethod $contactMethod
     * @throws AuthorizationException
     * @return void
     */
    public function show(ContactMethod $contactMethod)
    {
        $this->authorize('admin.contact-method.show', $contactMethod);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ContactMethod $contactMethod
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ContactMethod $contactMethod)
    {
        $this->authorize('admin.contact-method.edit', $contactMethod);


        return view('admin.contact-method.edit', [
            'contactMethod' => $contactMethod,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateContactMethod $request
     * @param ContactMethod $contactMethod
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateContactMethod $request, ContactMethod $contactMethod)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ContactMethod
        $contactMethod->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/contact-methods'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/contact-methods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyContactMethod $request
     * @param ContactMethod $contactMethod
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyContactMethod $request, ContactMethod $contactMethod)
    {
        $contactMethod->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyContactMethod $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyContactMethod $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ContactMethod::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
