<?php

namespace Litecms\Newsletter\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Litecms\Newsletter\Interfaces\NewsletterRepositoryInterface;
use Litecms\Newsletter\Repositories\Presenter\NewsletterItemTransformer;

/**
 * Pubic API controller class.
 */
class NewsletterPublicController extends BaseController
{
    /**
     * Constructor.
     *
     * @param type \Litecms\Newsletter\Interfaces\NewsletterRepositoryInterface $newsletter
     *
     * @return type
     */
    public function __construct(NewsletterRepositoryInterface $newsletter)
    {
        $this->repository = $newsletter;
        parent::__construct();
    }

    /**
     * Show newsletter's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $newsletters = $this->repository
            ->setPresenter('\\Litecms\\Newsletter\\Repositories\\Presenter\\NewsletterListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $newsletters['code'] = 2000;
        return response()->json($newsletters)
                ->setStatusCode(200, 'INDEX_SUCCESS');
    }

    /**
     * Show newsletter.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $newsletter = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($newsletter)) {
            $newsletter         = $this->itemPresenter($module, new NewsletterItemTransformer);
            $newsletter['code'] = 2001;
            return response()->json($newsletter)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
