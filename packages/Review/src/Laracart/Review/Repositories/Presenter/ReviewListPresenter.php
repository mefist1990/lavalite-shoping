<?php

namespace Laracart\Review\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class ReviewListPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ReviewListTransformer();
    }
}