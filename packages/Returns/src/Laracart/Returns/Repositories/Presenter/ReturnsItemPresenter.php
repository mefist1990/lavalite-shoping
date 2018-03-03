<?php

namespace Laracart\Returns\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class ReturnsItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ReturnsItemTransformer();
    }
}