<?php

use Illuminate\Database\Seeder;

class ReturnReasonTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('return_reasons')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'returns.return_reason.view',
                'name'      => 'View ReturnReason',
            ],
            [
                'slug'      => 'returns.return_reason.create',
                'name'      => 'Create ReturnReason',
            ],
            [
                'slug'      => 'returns.return_reason.edit',
                'name'      => 'Update ReturnReason',
            ],
            [
                'slug'      => 'returns.return_reason.delete',
                'name'      => 'Delete ReturnReason',
            ],
            /*
            [
                'slug'      => 'returns.return_reason.verify',
                'name'      => 'Verify ReturnReason',
            ],
            [
                'slug'      => 'returns.return_reason.approve',
                'name'      => 'Approve ReturnReason',
            ],
            [
                'slug'      => 'returns.return_reason.publish',
                'name'      => 'Publish ReturnReason',
            ],
            [
                'slug'      => 'returns.return_reason.unpublish',
                'name'      => 'Unpublish ReturnReason',
            ],
            [
                'slug'      => 'returns.return_reason.cancel',
                'name'      => 'Cancel ReturnReason',
            ],
            [
                'slug'      => 'returns.return_reason.archive',
                'name'      => 'Archive ReturnReason',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/returns/return_reason',
                'name'        => 'ReturnReason',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/returns/return_reason',
                'name'        => 'ReturnReason',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'return_reason',
                'name'        => 'ReturnReason',
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
                'key'      => 'returns.return_reason.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
