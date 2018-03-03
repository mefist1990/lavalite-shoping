<?php

use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('reviews')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'review.review.view',
                'name'      => 'View Review',
            ],
            [
                'slug'      => 'review.review.create',
                'name'      => 'Create Review',
            ],
            [
                'slug'      => 'review.review.edit',
                'name'      => 'Update Review',
            ],
            [
                'slug'      => 'review.review.delete',
                'name'      => 'Delete Review',
            ],
            /*
            [
                'slug'      => 'review.review.verify',
                'name'      => 'Verify Review',
            ],
            [
                'slug'      => 'review.review.approve',
                'name'      => 'Approve Review',
            ],
            [
                'slug'      => 'review.review.publish',
                'name'      => 'Publish Review',
            ],
            [
                'slug'      => 'review.review.unpublish',
                'name'      => 'Unpublish Review',
            ],
            [
                'slug'      => 'review.review.cancel',
                'name'      => 'Cancel Review',
            ],
            [
                'slug'      => 'review.review.archive',
                'name'      => 'Archive Review',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/review/review',
                'name'        => 'Review',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/review/review',
                'name'        => 'Review',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'review',
                'name'        => 'Review',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            [
                'key'      => 'review.review.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
