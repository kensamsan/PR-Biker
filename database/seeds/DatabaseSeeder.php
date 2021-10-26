<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Privilege;
use App\Role;
use App\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $admin = User::create([
			'username'	=>	'gabu@gmail.com',
			'password'	=>	Hash::make('admin'),
			'first_name'	=>	'Super',
			'middle_name'	=>	'User',
			'last_name'	=>	'Admin',
			'email' => 'gabu@gmail.com',
			'contact'=>	'7493345',
			'photo'=>	'anon.png',
			'active' => '1',
		]);

		DB::table('var')->insert([
				'name' => 'software_name',
				'value' => 'Bikers',
				'description' => 'Software Name',
			]);
		DB::table('var')->insert([
				'name' => 'software_description',
				'value' => 'Description',
				'description' => 'Software Description',
			]);
		DB::table('var')->insert([
				'name' => 'software_logo',
				'value' => 'software_logo.png',
				'description' => 'Software Logo',
			]);
		DB::table('var')->insert([
			'name' => 'company_name',
			'value' => 'Aguora IT Solutions & Technology',
			'description' => 'Company Name',
			]);
		DB::table('var')->insert([
			'name' => 'company_address',
			'value' => '72A Dorotea Balintawak, Caloocan City',
			'description' => 'Company Address',
			]);
		DB::table('var')->insert([
			'name' => 'company_phone',
			'value' => '3651481',
			'description' => 'Company Phone',
			]);
		DB::table('var')->insert([
			'name' => 'company_logo',
			'value' => 'company_logo.png',
			'description' => 'Company Logo',
			]);
		DB::table('var')->insert([
				'name' => 'letter_header',
				'value' => '',
				'description' => 'Letter Header',
			]);
		DB::table('var')->insert([
				'name' => 'report_footer',
				'value' => '',
				'description' => 'Report Footer',
			]);
		$superuser = Role::create([
			'name' => 'superuser',
			]);
		DB::table('role_user')->insert([
			'user_id' => $admin->id,
			'role_id' => $superuser->id,
			]);

		$is_allow_users = Privilege::create([
			'name' => 'is_allow_users',
			]);
		DB::table('privilege_role')->insert([
			'role_id' => $superuser->id,
			'privilege_id' => $is_allow_users->id,
			]);

		$is_allow_activity_logs = Privilege::create([
			'name' => 'is_allow_activity_logs',
			]);
		DB::table('privilege_role')->insert([
		 	'role_id' => $superuser->id,
		 	'privilege_id' => $is_allow_activity_logs->id,
			]);

		$is_allow_application_settings = Privilege::create([
			'name' => 'is_allow_application_settings',
			]);
		DB::table('privilege_role')->insert([
			'role_id' => $superuser->id,
			'privilege_id' => $is_allow_application_settings->id,
			]);

		$is_allow_roles = Privilege::create([
			'name' => 'is_allow_roles',
			]);
		 DB::table('privilege_role')->insert([
		 	'role_id' => $superuser->id,
		 	'privilege_id' => $is_allow_roles->id,
		 	]);

		 $is_allow_products = Privilege::create([
			'name' => 'is_allow_products',
			]);
		 DB::table('privilege_role')->insert([
		 	'role_id' => $superuser->id,
		 	'privilege_id' => $is_allow_products->id,
		 	]);
		 
		 $is_allow_dashboard = Privilege::create([
			'name' => 'is_allow_dashboard',
			]);
		 DB::table('privilege_role')->insert([
		 	'role_id' => $superuser->id,
		 	'privilege_id' => $is_allow_dashboard->id,
		 	]);
 
		 $is_admin = Privilege::create([
			'name' => 'is_admin',
			]);
		 DB::table('privilege_role')->insert([
		 	'role_id' => $superuser->id,
		 	'privilege_id' => $is_admin->id,
		 	]);


		 $category = Category::create([
			'category_name' => 'Bikes',
			'active' => 1,
			]);
		
		
		
    }
}
