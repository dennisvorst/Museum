<?php


use Phinx\Seed\AbstractSeed;

class UsersSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
    	$data = [

[
	'iduser' => '1',
	'nmuser' => 'admin',
	'ftemail' => 'info@honkbalmuseum.nl',
	'nmpassword' => 'Museum714',
	'created_at' => '2019-03-24 09:23:43',
	'changed_by' => 'info@honkbalmuseum.nl',
],

    	];

        $table = $this->table('users');
        $table->insert($data)
              ->save();

    }
}
