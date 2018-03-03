<?php

use Illuminate\Database\Seeder;

class CartTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('carts')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'cart.cart.view',
                'name'      => 'View Cart',
            ],
            [
                'slug'      => 'cart.cart.create',
                'name'      => 'Create Cart',
            ],
            [
                'slug'      => 'cart.cart.edit',
                'name'      => 'Update Cart',
            ],
            [
                'slug'      => 'cart.cart.delete',
                'name'      => 'Delete Cart',
            ],
            /*
            [
                'slug'      => 'cart.cart.verify',
                'name'      => 'Verify Cart',
            ],
            [
                'slug'      => 'cart.cart.approve',
                'name'      => 'Approve Cart',
            ],
            [
                'slug'      => 'cart.cart.publish',
                'name'      => 'Publish Cart',
            ],
            [
                'slug'      => 'cart.cart.unpublish',
                'name'      => 'Unpublish Cart',
            ],
            [
                'slug'      => 'cart.cart.cancel',
                'name'      => 'Cancel Cart',
            ],
            [
                'slug'      => 'cart.cart.archive',
                'name'      => 'Archive Cart',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/cart/cart',
                'name'        => 'Cart',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/cart/cart',
                'name'        => 'Cart',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'cart',
                'name'        => 'Cart',
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
                'key'      => 'cart.cart.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
