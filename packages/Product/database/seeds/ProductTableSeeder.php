<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'product.product.view',
                'name'      => 'View Product',
            ],
            [
                'slug'      => 'product.product.create',
                'name'      => 'Create Product',
            ],
            [
                'slug'      => 'product.product.edit',
                'name'      => 'Update Product',
            ],
            [
                'slug'      => 'product.product.delete',
                'name'      => 'Delete Product',
            ],
            /*
            [
                'slug'      => 'product.product.verify',
                'name'      => 'Verify Product',
            ],
            [
                'slug'      => 'product.product.approve',
                'name'      => 'Approve Product',
            ],
            [
                'slug'      => 'product.product.publish',
                'name'      => 'Publish Product',
            ],
            [
                'slug'      => 'product.product.unpublish',
                'name'      => 'Unpublish Product',
            ],
            [
                'slug'      => 'product.product.cancel',
                'name'      => 'Cancel Product',
            ],
            [
                'slug'      => 'product.product.archive',
                'name'      => 'Archive Product',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/product/product',
                'name'        => 'Product',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/product/product',
                'name'        => 'Product',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'product',
                'name'        => 'Product',
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
                'key'      => 'product.product.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
