<?php

namespace App\Http\Controllers;

use App\DataTables\InquiryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInquiryRequest;
use App\Http\Requests\UpdateInquiryRequest;
use App\Models\CustomField;
use App\Repositories\InquiryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use function url;

class InquiryController extends AppBaseController
{
    /** @var  InquiryRepository */
    private $inquiryRepository;

    public function __construct(InquiryRepository $inquiryRepo)
    {
        $this->inquiryRepository = $inquiryRepo;
    }

    /**
     * Display a listing of the Inquiry.
     *
     * @param InquiryDataTable $inquiryDataTable
     * @return Response
     */
    public function index(InquiryDataTable $inquiryDataTable)
    {
        return $inquiryDataTable->render('admin.inquiries.index');
    }

    /**
     * Show the form for creating a new Inquiry.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.inquiries.create');
    }

    /**
     * Store a newly created Inquiry in storage.
     *
     * @param CreateInquiryRequest $request
     *
     * @return Response
     */
    public function store(CreateInquiryRequest $request)
    {
        $input = $request->all();

        $input['ip_address'] = $request->ip_address ?? $request->ip();
        $input['url'] = $request->url ?? url()->current();

        $inquiry = $this->inquiryRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/inquiries.singular')]));

        return redirect(route('admin.inquiries.index'));
    }

    /**
     * Display the specified Inquiry.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inquiry = $this->inquiryRepository->find($id);

        if (empty($inquiry)) {
            Flash::error(__('messages.not_found', ['model' => __('models/inquiries.singular')]));

            return redirect(route('admin.inquiries.index'));
        }

        $custom_fields = CustomField::where('site_id',$inquiry->site_id)->get();
        $custom_saved_data = json_decode($inquiry->saved_data,true);

        return view('admin.inquiries.show',compact('inquiry','custom_saved_data','custom_fields'));
    }

    /**
     * Show the form for editing the specified Inquiry.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inquiry = $this->inquiryRepository->find($id);

        if (empty($inquiry)) {
            Flash::error(__('messages.not_found', ['model' => __('models/inquiries.singular')]));

            return redirect(route('admin.inquiries.index'));
        }

        return view('admin.inquiries.edit')->with('inquiry', $inquiry);
    }

    /**
     * Update the specified Inquiry in storage.
     *
     * @param  int              $id
     * @param UpdateInquiryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInquiryRequest $request)
    {
        $inquiry = $this->inquiryRepository->find($id);

        if (empty($inquiry)) {
            Flash::error(__('messages.not_found', ['model' => __('models/inquiries.singular')]));

            return redirect(route('admin.inquiries.index'));
        }

        $inquiry = $this->inquiryRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/inquiries.singular')]));

        return redirect(route('admin.inquiries.index'));
    }

    /**
     * Remove the specified Inquiry from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inquiry = $this->inquiryRepository->find($id);

        if (empty($inquiry)) {
            Flash::error(__('messages.not_found', ['model' => __('models/inquiries.singular')]));

            return redirect(route('admin.inquiries.index'));
        }

        $this->inquiryRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/inquiries.singular')]));

        return redirect(route('admin.inquiries.index'));
    }
}
