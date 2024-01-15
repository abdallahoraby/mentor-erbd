<?php

namespace App\Http\Controllers;

use App\DataTables\CustomFieldDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCustomFieldRequest;
use App\Http\Requests\UpdateCustomFieldRequest;
use App\Repositories\CustomFieldRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CustomFieldController extends AppBaseController
{
    /** @var  CustomFieldRepository */
    private $customFieldRepository;

    public function __construct(CustomFieldRepository $customFieldRepo)
    {
        $this->customFieldRepository = $customFieldRepo;
    }

    /**
     * Display a listing of the CustomField.
     *
     * @param CustomFieldDataTable $customFieldDataTable
     * @return Response
     */
    public function index(CustomFieldDataTable $customFieldDataTable)
    {
        return $customFieldDataTable->render('admin.custom_fields.index');
    }

    /**
     * Show the form for creating a new CustomField.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.custom_fields.create');
    }

    /**
     * Store a newly created CustomField in storage.
     *
     * @param CreateCustomFieldRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomFieldRequest $request)
    {
        $input = $request->all();

        $customField = $this->customFieldRepository->create($input);

        $this->customFieldRepository->add_options($request,$customField);

        Flash::success(__('messages.saved', ['model' => __('models/custom_fields.singular')]));

        return redirect(route('admin.sites.index'));
    }

    /**
     * Display the specified CustomField.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $customField = $this->customFieldRepository->find($id);

        if (empty($customField)) {
            Flash::error(__('messages.not_found', ['model' => __('models/custom_fields.singular')]));

            return redirect(route('admin.custom_fields.index'));
        }

        return view('admin.custom_fields.show')->with('customField', $customField);
    }

    /**
     * Show the form for editing the specified CustomField.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customField = $this->customFieldRepository->find($id);

        if (empty($customField)) {
            Flash::error(__('messages.not_found', ['model' => __('models/custom_fields.singular')]));

            return redirect(route('admin.custom_fields.index'));
        }

        return view('admin.custom_fields.edit')->with('customField', $customField);
    }

    /**
     * Update the specified CustomField in storage.
     *
     * @param  int              $id
     * @param UpdateCustomFieldRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomFieldRequest $request)
    {
        $customField = $this->customFieldRepository->find($id);

        if (empty($customField)) {
            Flash::error(__('messages.not_found', ['model' => __('models/custom_fields.singular')]));

            return redirect(route('admin.sites.index'));
        }

        $customField = $this->customFieldRepository->update($request->all(), $id);

        $this->customFieldRepository->add_options($request,$customField);

        Flash::success(__('messages.updated', ['model' => __('models/custom_fields.singular')]));

        return redirect(route('admin.sites.index'));
    }

    /**
     * Remove the specified CustomField from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $customField = $this->customFieldRepository->find($id);

        if (empty($customField)) {
            Flash::error(__('messages.not_found', ['model' => __('models/custom_fields.singular')]));

            return redirect(route('admin.custom_fields.index'));
        }

        $this->customFieldRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/custom_fields.singular')]));

        return redirect(route('admin.custom_fields.index'));
    }
}
