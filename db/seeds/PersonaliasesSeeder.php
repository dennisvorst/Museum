<?php


use Phinx\Seed\AbstractSeed;

class PersonaliasesSeeder extends AbstractSeed
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
	'idalias' => '1',
	'idperson' => '268',
	'nmperson' => 'Piet Luteijn',
	'created_at' => '2019-03-24 09:20:06',
	'updated_by' => 'info@honkbalmuseum.nl',
],

    	];

        $table = $this->table('personaliases');
        $table->insert($data)
              ->save();

    }
}
