<?php

use Illuminate\Database\Seeder;

class ReturnsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('returns')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'returns.returns.view',
                'name'      => 'View Returns',
            ],
            [
                'slug'      => 'returns.returns.create',
                'name'      => 'Create Returns',
            ],
            [
                'slug'      => 'returns.returns.edit',
                'name'      => 'Update Returns',
            ],
            [
                'slug'      => 'returns.returns.delete',
                'name'      => 'Delete Returns',
            ],
            /*
            [
                'slug'      => 'returns.returns.verify',
                'name'      => 'Verify Returns',
            ],
            [
                'slug'      => 'returns.returns.approve',
                'name'      => 'Approve Returns',
            ],
            [
                'slug'      => 'returns.returns.publish',
                'name'      => 'Publish Returns',
            ],
            [
                'slug'      => 'returns.returns.unpublish',
                'name'      => 'Unpublish Returns',
            ],
            [
                'slug'      => 'returns.returns.cancel',
                'name'      => 'Cancel Returns',
            ],
            [
                'slug'      => 'returns.returns.archive',
                'name'      => 'Archive Returns',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/returns/returns',
                'name'        => 'Returns',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/returns/returns',
                'name'        => 'Returns',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'returns',
                'name'        => 'Returns',
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
                'key'      => 'returns.returns.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
