<?php

namespace Laracart\Returns\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class ReturnReasonListPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ReturnReasonListTransformer();
    }
}