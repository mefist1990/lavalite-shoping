<?php

use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_statuses')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'order.order_status.view',
                'name'      => 'View OrderStatus',
            ],
            [
                'slug'      => 'order.order_status.create',
                'name'      => 'Create OrderStatus',
            ],
            [
                'slug'      => 'order.order_status.edit',
                'name'      => 'Update OrderStatus',
            ],
            [
                'slug'      => 'order.order_status.delete',
                'name'      => 'Delete OrderStatus',
            ],
            /*
            [
                'slug'      => 'order.order_status.verify',
                'name'      => 'Verify OrderStatus',
            ],
            [
                'slug'      => 'order.order_status.approve',
                'name'      => 'Approve OrderStatus',
            ],
            [
                'slug'      => 'order.order_status.publish',
                'name'      => 'Publish OrderStatus',
            ],
            [
                'slug'      => 'order.order_status.unpublish',
                'name'      => 'Unpublish OrderStatus',
            ],
            [
                'slug'      => 'order.order_status.cancel',
                'name'      => 'Cancel OrderStatus',
            ],
            [
                'slug'      => 'order.order_status.archive',
                'name'      => 'Archive OrderStatus',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/order/order_status',
                'name'        => 'OrderStatus',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/order/order_status',
                'name'        => 'OrderStatus',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'order_status',
                'name'        => 'OrderStatus',
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
                'key'      => 'order.order_status.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
