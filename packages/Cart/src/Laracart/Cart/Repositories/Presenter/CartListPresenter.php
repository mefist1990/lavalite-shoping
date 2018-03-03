<?php

namespace Laracart\Cart\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class CartListPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CartListTransformer();
    }
}