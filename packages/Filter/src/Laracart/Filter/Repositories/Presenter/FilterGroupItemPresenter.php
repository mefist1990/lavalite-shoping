<?php

namespace Laracart\Filter\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class FilterGroupItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FilterGroupItemTransformer();
    }
}