<?php

namespace Laracart\Filter\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class FilterItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FilterItemTransformer();
    }
}