<?php

namespace Laracart\Attribute\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class AttributeItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AttributeItemTransformer();
    }
}