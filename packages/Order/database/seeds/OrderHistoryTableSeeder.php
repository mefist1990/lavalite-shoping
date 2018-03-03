<?php

use Illuminate\Database\Seeder;

class OrderHistoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_histories')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'order.order_history.view',
                'name'      => 'View OrderHistory',
            ],
            [
                'slug'      => 'order.order_history.create',
                'name'      => 'Create OrderHistory',
            ],
            [
                'slug'      => 'order.order_history.edit',
                'name'      => 'Update OrderHistory',
            ],
            [
                'slug'      => 'order.order_history.delete',
                'name'      => 'Delete OrderHistory',
            ],
            /*
            [
                'slug'      => 'order.order_history.verify',
                'name'      => 'Verify OrderHistory',
            ],
            [
                'slug'      => 'order.order_history.approve',
                'name'      => 'Approve OrderHistory',
            ],
            [
                'slug'      => 'order.order_history.publish',
                'name'      => 'Publish OrderHistory',
            ],
            [
                'slug'      => 'order.order_history.unpublish',
                'name'      => 'Unpublish OrderHistory',
            ],
            [
                'slug'      => 'order.order_history.cancel',
                'name'      => 'Cancel OrderHistory',
            ],
            [
                'slug'      => 'order.order_history.archive',
                'name'      => 'Archive OrderHistory',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/order/order_history',
                'name'        => 'OrderHistory',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/order/order_history',
                'name'        => 'OrderHistory',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'order_history',
                'name'        => 'OrderHistory',
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
                'key'      => 'order.order_history.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
