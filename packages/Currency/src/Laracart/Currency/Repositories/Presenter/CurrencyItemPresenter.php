<?php

namespace Laracart\Currency\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class CurrencyItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CurrencyItemTransformer();
    }
}