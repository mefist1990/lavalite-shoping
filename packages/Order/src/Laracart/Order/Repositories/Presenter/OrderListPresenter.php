<?php

namespace Laracart\Order\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class OrderListPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OrderListTransformer();
    }
}