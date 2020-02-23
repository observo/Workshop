<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrPermissions = [
            'manage user',
            'create user',
            'edit user',
            'delete user',
            'manage language',
            'create language',
            'manage account',
            'edit account',
            'change password account',
            'manage system settings',
            'manage role',
            'create role',
            'edit role',
            'delete role',
            'manage permission',
            'create permission',
            'edit permission',
            'delete permission',
            'manage company settings',
            'manage stripe settings',
            'manage expense',
            'create expense',
            'edit expense',
            'delete expense',
            'manage invoice',
            'create invoice',
            'edit invoice',
            'delete invoice',
            'show invoice',
            'create payment invoice',
            'delete payment invoice',
            'send invoice',
            'delete invoice product',
            'manage change password',
            'manage plan',
            'create plan',
            'edit plan',
            'manage constant unit',
            'create constant unit',
            'edit constant unit',
            'delete constant unit',
            'manage constant tax',
            'create constant tax',
            'edit constant tax',
            'delete constant tax',
            'manage constant category',
            'create constant category',
            'edit constant category',
            'delete constant category',
            'manage product & service',
            'create product & service',
            'edit product & service',
            'delete product & service',
            'manage customer',
            'create customer',
            'edit customer',
            'delete customer',
            'manage vender',
            'create vender',
            'edit vender',
            'delete vender',
            'manage bank account',
            'create bank account',
            'edit bank account',
            'delete bank account',
            'manage transfer',
            'create transfer',
            'edit transfer',
            'delete transfer',
            'manage constant payment method',
            'create constant payment method',
            'edit constant payment method',
            'delete constant payment method',
            'manage transaction',
            'manage revenue',
            'create revenue',
            'edit revenue',
            'delete revenue',
            'manage bill',
            'create bill',
            'edit bill',
            'delete bill',
            'show bill',
            'manage payment',
            'create payment',
            'edit payment',
            'delete payment',
            'delete bill product',
            'buy plan',
            'send bill',
            'create payment bill',
            'delete payment bill',
            'manage order',
            'income report',
            'expense report',
            'income vs expense report',
            'tax report',
            'loss & profit report',
            'manage customer payment',
            'manage customer transaction',
            'manage customer invoice',
            'vender manage bill',
            'manage vender bill',
            'manage vender payment',
            'manage vender transaction',
        ];

        foreach($arrPermissions as $ap)
        {
            Permission::create(['name' => $ap]);
        }

        // Super admin

        $superAdminRole        = Role::create(
            [
                'name' => 'super admin',
                'created_by' => 0,
            ]
        );
        $superAdminPermissions = [
            'manage user',
            'create user',
            'edit user',
            'delete user',
            'manage language',
            'create language',
            'manage account',
            'edit account',
            'change password account',
            'manage system settings',
            'manage stripe settings',
            'manage role',
            'create role',
            'edit role',
            'delete role',
            'manage permission',
            'create permission',
            'edit permission',
            'delete permission',
            'manage change password',
            'manage plan',
            'create plan',
            'edit plan',
            'manage order',

        ];
        foreach($superAdminPermissions as $ap)
        {
            $permission = Permission::findByName($ap);
            $superAdminRole->givePermissionTo($permission);
        }
        $superAdmin = User::create(
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('1234'),
                'type' => 'super admin',
                'lang' => 'en',
                'avatar' => '',
                'created_by' => 0,
            ]
        );
        $superAdmin->assignRole($superAdminRole);

        // customer
        $customerRole       = Role::create(
            [
                'name' => 'customer',
                'created_by' => 0,
            ]
        );
        $customerPermission = [
            'manage account',
            'edit account',
            'manage language',
            'change password account',
            'manage customer payment',
            'manage customer transaction',
            'manage customer invoice',
            'show invoice',
        ];

        foreach($customerPermission as $ap)
        {
            $permission = Permission::findByName($ap);
            $customerRole->givePermissionTo($permission);
        }

        // vender
        $venderRole       = Role::create(
            [
                'name' => 'vender',
                'created_by' => 0,
            ]
        );
        $venderPermission = [
            'manage account',
            'edit account',
            'manage language',
            'change password account',
            'vender manage bill',
            'manage vender bill',
            'manage vender payment',
            'manage vender transaction',
            'show bill',
        ];

        foreach($venderPermission as $ap)
        {
            $permission = Permission::findByName($ap);
            $venderRole->givePermissionTo($permission);
        }


        // company

        $companyRole        = Role::create(
            [
                'name' => 'company',
                'created_by' => $superAdmin->id,
            ]
        );
        $companyPermissions = [
            'manage user',
            'create user',
            'edit user',
            'delete user',
            'manage language',
            'manage account',
            'edit account',
            'change password account',
            'manage role',
            'create role',
            'edit role',
            'delete role',
            'manage permission',
            'create permission',
            'edit permission',
            'delete permission',
            'manage company settings',
            'manage expense',
            'create expense',
            'edit expense',
            'delete expense',
            'manage invoice',
            'create invoice',
            'edit invoice',
            'delete invoice',
            'show invoice',
            'manage change password',
            'manage plan',
            'buy plan',
            'manage product & service',
            'create product & service',
            'delete product & service',
            'edit product & service',
            'manage constant tax',
            'create constant tax',
            'edit constant tax',
            'delete constant tax',
            'manage constant category',
            'create constant category',
            'edit constant category',
            'delete constant category',
            'manage constant unit',
            'create constant unit',
            'edit constant unit',
            'delete constant unit',
            'manage customer',
            'create customer',
            'edit customer',
            'delete customer',
            'manage vender',
            'create vender',
            'edit vender',
            'delete vender',
            'manage bank account',
            'create bank account',
            'edit bank account',
            'delete bank account',
            'manage transfer',
            'create transfer',
            'edit transfer',
            'delete transfer',
            'manage constant payment method',
            'create constant payment method',
            'edit constant payment method',
            'delete constant payment method',
            'manage revenue',
            'create revenue',
            'edit revenue',
            'delete revenue',
            'manage bill',
            'create bill',
            'edit bill',
            'delete bill',
            'show bill',
            'manage payment',
            'create payment',
            'edit payment',
            'delete payment',
            'delete invoice product',
            'delete bill product',
            'send invoice',
            'create payment invoice',
            'delete payment invoice',
            'send bill',
            'create payment bill',
            'delete payment bill',
            'income report',
            'expense report',
            'income vs expense report',
            'tax report',
            'loss & profit report',
            'manage transaction',
        ];

        foreach($companyPermissions as $ap)
        {
            $permission = Permission::findByName($ap);
            $companyRole->givePermissionTo($permission);
        }
        $company = User::create(
            [
                'name' => 'company',
                'email' => 'company@example.com',
                'password' => Hash::make('1234'),
                'type' => 'company',
                'lang' => 'en',
                'avatar' => '',
                'plan' => 1,
                'created_by' => $superAdmin->id,
            ]
        );
        $company->assignRole($companyRole);

        // accountant
        $accountantRole       = Role::create(
            [
                'name' => 'accountant',
                'created_by' => $company->id,
            ]
        );
        $accountantPermission = [
            'manage account',
            'edit account',
            'change password account',
            'manage expense',
            'create expense',
            'edit expense',
            'delete expense',
            'manage invoice',
            'create invoice',
            'edit invoice',
            'delete invoice',
            'show invoice',
            'manage change password',
            'manage product & service',
            'create product & service',
            'delete product & service',
            'edit product & service',
            'manage constant tax',
            'create constant tax',
            'edit constant tax',
            'delete constant tax',
            'manage constant category',
            'create constant category',
            'edit constant category',
            'delete constant category',
            'manage constant unit',
            'create constant unit',
            'edit constant unit',
            'delete constant unit',
            'manage customer',
            'create customer',
            'edit customer',
            'delete customer',
            'manage vender',
            'create vender',
            'edit vender',
            'delete vender',
            'manage bank account',
            'create bank account',
            'edit bank account',
            'delete bank account',
            'manage transfer',
            'create transfer',
            'edit transfer',
            'delete transfer',
            'manage constant payment method',
            'create constant payment method',
            'edit constant payment method',
            'delete constant payment method',
            'manage revenue',
            'create revenue',
            'edit revenue',
            'delete revenue',
            'manage bill',
            'create bill',
            'edit bill',
            'delete bill',
            'show bill',
            'manage payment',
            'create payment',
            'edit payment',
            'delete payment',
            'delete invoice product',
            'delete bill product',
            'send invoice',
            'create payment invoice',
            'delete payment invoice',
            'send bill',
            'create payment bill',
            'delete payment bill',
            'income report',
            'expense report',
            'income vs expense report',
            'tax report',
            'loss & profit report',
            'manage transaction',
        ];

        foreach($accountantPermission as $ap)
        {
            $permission = Permission::findByName($ap);
            $accountantRole->givePermissionTo($permission);
        }

        $accountant = User::create(
            [
                'name' => 'accountant',
                'email' => 'accountant@example.com',
                'password' => Hash::make('1234'),
                'type' => 'accountant',
                'lang' => 'en',
                'avatar' => '',
                'created_by' => $company->id,
            ]
        );
        $accountant->assignRole($accountantRole);
    }
}
