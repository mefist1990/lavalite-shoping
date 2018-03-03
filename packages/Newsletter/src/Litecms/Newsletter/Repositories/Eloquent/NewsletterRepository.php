<?php

namespace Litecms\Newsletter\Repositories\Eloquent;

use Litecms\Newsletter\Interfaces\NewsletterRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class NewsletterRepository extends BaseRepository implements NewsletterRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('litecms.newsletter.newsletter.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('litecms.newsletter.newsletter.model');
    }
}
