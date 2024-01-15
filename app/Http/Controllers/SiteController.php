<?php

namespace App\Http\Controllers;

use App\DataTables\SiteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Models\SiteImage;
use App\Repositories\SiteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SiteController extends AppBaseController
{
    /** @var  SiteRepository */
    private $siteRepository;

    public function __construct(SiteRepository $siteRepo)
    {
        $this->siteRepository = $siteRepo;
    }

    /**
     * Display a listing of the Site.
     *
     * @param SiteDataTable $siteDataTable
     * @return Response
     */
    public function index(SiteDataTable $siteDataTable)
    {
        return $siteDataTable->render('admin.sites.index');
    }

    /**
     * Show the form for creating a new Site.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.sites.create');
    }

    /**
     * Store a newly created Site in storage.
     *
     * @param CreateSiteRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteRequest $request)
    {
        $input = $request->all();

        if (file_exists($request->logo)) {
            $file = $request->file('logo');
            $input['logo']  =  'images/sites/'.$file->move('images/sites',  uniqid(time(), true).$file->getClientOriginalName())
                    ->getFilename();
        }

        if (file_exists($request->banner)) {
            $file = $request->file('banner');
            $input['banner']  =  'images/sites/'.$file->move('images/sites',  uniqid(time(), true).$file->getClientOriginalName())
                    ->getFilename();
        }

        if (file_exists($request->about_image)) {
            $file = $request->file('about_image');
            $input['about_image']  =  'images/sites/'.$file->move('images/sites',  uniqid(time(), true).$file->getClientOriginalName())
                    ->getFilename();
        }

        $site = $this->siteRepository->create($input);

        if ($request->partners) {
            foreach ($request->file('partners') as $file){
                $partner_logo  =  'images/sites/'.$file->move('images/sites',  uniqid(time(), true).$file->getClientOriginalName())
                        ->getFilename();
                $partner = new SiteImage();
                $partner->site_id = $site->id;
                $partner->logo = $partner_logo;
                $partner->save();
            }
        }

        Flash::success(__('messages.saved', ['model' => __('models/sites.singular')]));

        return redirect(route('admin.sites.index'));
    }

    /**
     * Display the specified Site.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sites.singular')]));

            return redirect(route('admin.sites.index'));
        }

        return view('admin.sites.show')->with('site', $site);
    }

    /**
     * Show the form for editing the specified Site.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sites.singular')]));

            return redirect(route('admin.sites.index'));
        }

        return view('admin.sites.edit')->with('site', $site);
    }

    /**
     * Update the specified Site in storage.
     *
     * @param  int              $id
     * @param UpdateSiteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteRequest $request)
    {
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sites.singular')]));

            return redirect(route('admin.sites.index'));
        }

        $input = $request->all();
        if (file_exists($request->logo)) {
            $file = $request->file('logo');
            $input['logo']  =  'images/sites/'.$file->move('images/sites',  uniqid(time(), true).$file->getClientOriginalName())
                    ->getFilename();
        }

        else{
            $input['logo'] = $site->logo;
        }

        if (file_exists($request->banner)) {
            $file = $request->file('banner');
            $input['banner']  =  'images/sites/'.$file->move('images/sites',  uniqid(time(), true).$file->getClientOriginalName())
                    ->getFilename();
        }

        else{
            $input['banner'] = $site->banner;
        }

        if (file_exists($request->about_image)) {
            $file = $request->file('about_image');
            $input['about_image']  =  'images/sites/'.$file->move('images/sites',  uniqid(time(), true).$file->getClientOriginalName())
                    ->getFilename();
        }

        else{
            $input['about_image'] = $site->about_image;
        }

        $site = $this->siteRepository->update($input, $id);

        if ($request->partners) {
            foreach ($request->file('partners') as $file){
                $partner_logo  =  'images/sites/'.$file->move('images/sites',  uniqid(time(), true).$file->getClientOriginalName())
                        ->getFilename();
                $partner = new SiteImage();
                $partner->site_id = $site->id;
                $partner->logo = $partner_logo;
                $partner->save();
            }
        }

        Flash::success(__('messages.updated', ['model' => __('models/sites.singular')]));

        return redirect(route('admin.sites.index'));
    }

    /**
     * Remove the specified Site from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sites.singular')]));

            return redirect(route('admin.sites.index'));
        }

        $this->siteRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/sites.singular')]));

        return redirect(route('admin.sites.index'));
    }

    public function delete_file($id)
    {
        SiteImage::find($id)->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/siteInfos.fields.partners')]));

        return back();
    }


}
