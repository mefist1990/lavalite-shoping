<?php

use Illuminate\Database\Seeder;

class CouponTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('coupons')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'coupon.coupon.view',
                'name'      => 'View Coupon',
            ],
            [
                'slug'      => 'coupon.coupon.create',
                'name'      => 'Create Coupon',
            ],
            [
                'slug'      => 'coupon.coupon.edit',
                'name'      => 'Update Coupon',
            ],
            [
                'slug'      => 'coupon.coupon.delete',
                'name'      => 'Delete Coupon',
            ],
            /*
            [
                'slug'      => 'coupon.coupon.verify',
                'name'      => 'Verify Coupon',
            ],
            [
                'slug'      => 'coupon.coupon.approve',
                'name'      => 'Approve Coupon',
            ],
            [
                'slug'      => 'coupon.coupon.publish',
                'name'      => 'Publish Coupon',
            ],
            [
                'slug'      => 'coupon.coupon.unpublish',
                'name'      => 'Unpublish Coupon',
            ],
            [
                'slug'      => 'coupon.coupon.cancel',
                'name'      => 'Cancel Coupon',
            ],
            [
                'slug'      => 'coupon.coupon.archive',
                'name'      => 'Archive Coupon',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/coupon/coupon',
                'name'        => 'Coupon',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/coupon/coupon',
                'name'        => 'Coupon',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'coupon',
                'name'        => 'Coupon',
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
                'key'      => 'coupon.coupon.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
