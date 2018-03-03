<?php

namespace Litecms\Newsletter\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class NewsletterItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new NewsletterItemTransformer();
    }
}