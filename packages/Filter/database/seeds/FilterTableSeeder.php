<?php

use Illuminate\Database\Seeder;

class FilterTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('filters')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'filter.filter.view',
                'name'      => 'View Filter',
            ],
            [
                'slug'      => 'filter.filter.create',
                'name'      => 'Create Filter',
            ],
            [
                'slug'      => 'filter.filter.edit',
                'name'      => 'Update Filter',
            ],
            [
                'slug'      => 'filter.filter.delete',
                'name'      => 'Delete Filter',
            ],
            /*
            [
                'slug'      => 'filter.filter.verify',
                'name'      => 'Verify Filter',
            ],
            [
                'slug'      => 'filter.filter.approve',
                'name'      => 'Approve Filter',
            ],
            [
                'slug'      => 'filter.filter.publish',
                'name'      => 'Publish Filter',
            ],
            [
                'slug'      => 'filter.filter.unpublish',
                'name'      => 'Unpublish Filter',
            ],
            [
                'slug'      => 'filter.filter.cancel',
                'name'      => 'Cancel Filter',
            ],
            [
                'slug'      => 'filter.filter.archive',
                'name'      => 'Archive Filter',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/filter/filter',
                'name'        => 'Filter',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/filter/filter',
                'name'        => 'Filter',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'filter',
                'name'        => 'Filter',
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
                'key'      => 'filter.filter.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
