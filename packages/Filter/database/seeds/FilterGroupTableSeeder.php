<?php

use Illuminate\Database\Seeder;

class FilterGroupTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('filter_groups')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'filter.filter_group.view',
                'name'      => 'View FilterGroup',
            ],
            [
                'slug'      => 'filter.filter_group.create',
                'name'      => 'Create FilterGroup',
            ],
            [
                'slug'      => 'filter.filter_group.edit',
                'name'      => 'Update FilterGroup',
            ],
            [
                'slug'      => 'filter.filter_group.delete',
                'name'      => 'Delete FilterGroup',
            ],
            /*
            [
                'slug'      => 'filter.filter_group.verify',
                'name'      => 'Verify FilterGroup',
            ],
            [
                'slug'      => 'filter.filter_group.approve',
                'name'      => 'Approve FilterGroup',
            ],
            [
                'slug'      => 'filter.filter_group.publish',
                'name'      => 'Publish FilterGroup',
            ],
            [
                'slug'      => 'filter.filter_group.unpublish',
                'name'      => 'Unpublish FilterGroup',
            ],
            [
                'slug'      => 'filter.filter_group.cancel',
                'name'      => 'Cancel FilterGroup',
            ],
            [
                'slug'      => 'filter.filter_group.archive',
                'name'      => 'Archive FilterGroup',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/filter/filter_group',
                'name'        => 'FilterGroup',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/filter/filter_group',
                'name'        => 'FilterGroup',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'filter_group',
                'name'        => 'FilterGroup',
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
                'key'      => 'filter.filter_group.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
