<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('currencies')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'currency.currency.view',
                'name'      => 'View Currency',
            ],
            [
                'slug'      => 'currency.currency.create',
                'name'      => 'Create Currency',
            ],
            [
                'slug'      => 'currency.currency.edit',
                'name'      => 'Update Currency',
            ],
            [
                'slug'      => 'currency.currency.delete',
                'name'      => 'Delete Currency',
            ],
            /*
            [
                'slug'      => 'currency.currency.verify',
                'name'      => 'Verify Currency',
            ],
            [
                'slug'      => 'currency.currency.approve',
                'name'      => 'Approve Currency',
            ],
            [
                'slug'      => 'currency.currency.publish',
                'name'      => 'Publish Currency',
            ],
            [
                'slug'      => 'currency.currency.unpublish',
                'name'      => 'Unpublish Currency',
            ],
            [
                'slug'      => 'currency.currency.cancel',
                'name'      => 'Cancel Currency',
            ],
            [
                'slug'      => 'currency.currency.archive',
                'name'      => 'Archive Currency',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/currency/currency',
                'name'        => 'Currency',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/currency/currency',
                'name'        => 'Currency',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'currency',
                'name'        => 'Currency',
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
                'key'      => 'currency.currency.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
