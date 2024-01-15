<?php

namespace App\Http\Controllers;

use App\DataTables\ThemeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateThemeRequest;
use App\Http\Requests\UpdateThemeRequest;
use App\Repositories\ThemeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ThemeController extends AppBaseController
{
    /** @var  ThemeRepository */
    private $themeRepository;

    public function __construct(ThemeRepository $themeRepo)
    {
        $this->themeRepository = $themeRepo;
    }

    /**
     * Display a listing of the Theme.
     *
     * @param ThemeDataTable $themeDataTable
     * @return Response
     */
    public function index(ThemeDataTable $themeDataTable)
    {
        return $themeDataTable->render('admin.themes.index');
    }

    /**
     * Show the form for creating a new Theme.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.themes.create');
    }

    /**
     * Store a newly created Theme in storage.
     *
     * @param CreateThemeRequest $request
     *
     * @return Response
     */
    public function store(CreateThemeRequest $request)
    {
        $input = $request->all();

        if (file_exists($request->image)) {
            $file = $request->file('image');
            $input['image']  =  'images/themes/'.$file->move('images/themes',  uniqid(time(), true).$file->getClientOriginalName())
                    ->getFilename();
        }

        $theme = $this->themeRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/themes.singular')]));

        return redirect(route('admin.themes.index'));
    }

    /**
     * Display the specified Theme.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $theme = $this->themeRepository->find($id);

        if (empty($theme)) {
            Flash::error(__('messages.not_found', ['model' => __('models/themes.singular')]));

            return redirect(route('admin.themes.index'));
        }

        return view('admin.themes.show')->with('theme', $theme);
    }

    /**
     * Show the form for editing the specified Theme.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $theme = $this->themeRepository->find($id);

        if (empty($theme)) {
            Flash::error(__('messages.not_found', ['model' => __('models/themes.singular')]));

            return redirect(route('admin.themes.index'));
        }

        return view('admin.themes.edit')->with('theme', $theme);
    }

    /**
     * Update the specified Theme in storage.
     *
     * @param  int              $id
     * @param UpdateThemeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateThemeRequest $request)
    {
        $theme = $this->themeRepository->find($id);

        if (empty($theme)) {
            Flash::error(__('messages.not_found', ['model' => __('models/themes.singular')]));

            return redirect(route('admin.themes.index'));
        }

        $input = $request->all();
        if (file_exists($request->image)) {
            $file = $request->file('image');
            $input['image']  =  'images/themes/'.$file->move('images/themes',  uniqid(time(), true).$file->getClientOriginalName())
                    ->getFilename();
        }

        else{
            $input['image'] = $theme->image;
        }

        $theme = $this->themeRepository->update($input, $id);

        Flash::success(__('messages.updated', ['model' => __('models/themes.singular')]));

        return redirect(route('admin.themes.index'));
    }

    /**
     * Remove the specified Theme from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $theme = $this->themeRepository->find($id);

        if (empty($theme)) {
            Flash::error(__('messages.not_found', ['model' => __('models/themes.singular')]));

            return redirect(route('admin.themes.index'));
        }

        $this->themeRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/themes.singular')]));

        return redirect(route('admin.themes.index'));
    }
}
