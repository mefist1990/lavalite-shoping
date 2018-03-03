<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'category.category.view',
                'name'      => 'View Category',
            ],
            [
                'slug'      => 'category.category.create',
                'name'      => 'Create Category',
            ],
            [
                'slug'      => 'category.category.edit',
                'name'      => 'Update Category',
            ],
            [
                'slug'      => 'category.category.delete',
                'name'      => 'Delete Category',
            ],
            /*
            [
                'slug'      => 'category.category.verify',
                'name'      => 'Verify Category',
            ],
            [
                'slug'      => 'category.category.approve',
                'name'      => 'Approve Category',
            ],
            [
                'slug'      => 'category.category.publish',
                'name'      => 'Publish Category',
            ],
            [
                'slug'      => 'category.category.unpublish',
                'name'      => 'Unpublish Category',
            ],
            [
                'slug'      => 'category.category.cancel',
                'name'      => 'Cancel Category',
            ],
            [
                'slug'      => 'category.category.archive',
                'name'      => 'Archive Category',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/category/category',
                'name'        => 'Category',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/category/category',
                'name'        => 'Category',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'category',
                'name'        => 'Category',
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
                'key'      => 'category.category.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
