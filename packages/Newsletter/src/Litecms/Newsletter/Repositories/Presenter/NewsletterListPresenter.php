<?php

namespace Litecms\Newsletter\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class NewsletterListPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new NewsletterListTransformer();
    }
}