<?php

namespace Laracart\Attribute\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class AttributeGroupItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AttributeGroupItemTransformer();
    }
}