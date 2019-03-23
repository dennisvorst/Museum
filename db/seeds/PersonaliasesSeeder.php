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
	'dtlastmut' => '2015-10-14',
	'nmlastmut' => 'dennis.vorst@ziggo.nl',
	'dtcreated' => '2004-12-31 23:00:00',
],

    	];

        $table = $this->table('personaliases');
        $table->insert($data)
              ->save();

    }
}
