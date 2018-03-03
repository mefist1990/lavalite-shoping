<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('blog_categories')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'blog.category.view',
                'name'      => 'View Category',
            ],
            [
                'slug'      => 'blog.category.create',
                'name'      => 'Create Category',
            ],
            [
                'slug'      => 'blog.category.edit',
                'name'      => 'Update Category',
            ],
            [
                'slug'      => 'blog.category.delete',
                'name'      => 'Delete Category',
            ],
            /*
            [
                'slug'      => 'blog.category.verify',
                'name'      => 'Verify Category',
            ],
            [
                'slug'      => 'blog.category.approve',
                'name'      => 'Approve Category',
            ],
            [
                'slug'      => 'blog.category.publish',
                'name'      => 'Publish Category',
            ],
            [
                'slug'      => 'blog.category.unpublish',
                'name'      => 'Unpublish Category',
            ],
            [
                'slug'      => 'blog.category.cancel',
                'name'      => 'Cancel Category',
            ],
            [
                'slug'      => 'blog.category.archive',
                'name'      => 'Archive Category',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/blog/category',
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
                'url'         => 'user/blog/category',
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
                'key'      => 'blog.category.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
