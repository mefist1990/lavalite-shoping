<?php

namespace Laracart\Attribute\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Laracart\Attribute\Http\Requests\AttributeRequest;
use Laracart\Attribute\Interfaces\AttributeRepositoryInterface;
use Laracart\Attribute\Models\Attribute;

/**
 * Admin web controller class.
 */
class AttributeAdminController extends BaseController
{
    // use AttributeWorkflow;
    /**
     * Initialize attribute controller.
     *
     * @param type AttributeRepositoryInterface $attribute
     *
     * @return type
     */
    public function __construct(AttributeRepositoryInterface $attribute)
    {
        $this->repository = $attribute;
        parent::__construct();
    }

    /**
     * Display a list of attribute.
     *
     * @return Response
     */
    public function index(AttributeRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('attribute::attribute.names').' :: ');
        return $this->theme->of('attribute::admin.attribute.index')->render();
    }

    /**
     * Display a list of attribute.
     *
     * @return Response
     */
    public function getJson(AttributeRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $attributes  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Laracart\\Attribute\\Repositories\\Presenter\\AttributeListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $attributes['recordsTotal']    = $attributes['meta']['pagination']['total'];
        $attributes['recordsFiltered'] = $attributes['meta']['pagination']['total'];
        $attributes['request']         = $request->all();
        return response()->json($attributes, 200);

    }

    /**
     * Display attribute.
     *
     * @param Request $request
     * @param Model   $attribute
     *
     * @return Response
     */
    public function show(AttributeRequest $request, Attribute $attribute)
    {

        
        if (!$attribute->exists) {
            return response()->view('attribute::admin.attribute.new', compact('attribute'));
        }

        Form::populate($attribute);
        return response()->view('attribute::admin.attribute.show', compact('attribute'));
    }

    /**
     * Show the form for creating a new attribute.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(AttributeRequest $request)
    {

        $attribute = $this->repository->newInstance([]);

        Form::populate($attribute);

        return response()->view('attribute::admin.attribute.create', compact('attribute'));

    }

    /**
     * Create new attribute.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(AttributeRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $attribute          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('attribute::attribute.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/attribute/attribute/'.$attribute->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show attribute for editing.
     *
     * @param Request $request
     * @param Model   $attribute
     *
     * @return Response
     */
    public function edit(AttributeRequest $request, Attribute $attribute)
    {
        Form::populate($attribute);
        return  response()->view('attribute::admin.attribute.edit', compact('attribute'));
    }

    /**
     * Update the attribute.
     *
     * @param Request $request
     * @param Model   $attribute
     *
     * @return Response
     */
    public function update(AttributeRequest $request, Attribute $attribute)
    {
        try {

            $attributes = $request->all();

            $attribute->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('attribute::attribute.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/attribute/attribute/'.$attribute->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/attribute/attribute/'.$attribute->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the attribute.
     *
     * @param Model   $attribute
     *
     * @return Response
     */
    public function destroy(AttributeRequest $request, Attribute $attribute)
    {

        try {

            $t = $attribute->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('attribute::attribute.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/attribute/attribute/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/attribute/attribute/'.$attribute->getRouteKey()),
            ], 400);
        }
    }

     /**
     * select 2 attribute selection
     *
     * @param Model   $attribute
     *
     * @return Response
     */


    public function select2(AttributeRequest $request)
    {

        $slug = $request->get('q');
        $group_id=$request->get('id');
        if($slug!=''){
        $data['items']  = $this->repository
            ->scopeQuery(function ($query) use ($slug,$group_id){
                return $query
                        ->where('name', 'LIKE','%'.$slug.'%')
                        ->where('group_id', '=',$group_id)
                        ->orderBy('name', 'ASC');
            })->all();
        }


        $data['total_count'] = count($data['items']);

        return json_encode($data);
    }

}
