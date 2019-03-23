<?php


use Phinx\Seed\AbstractSeed;

class PersonvideosSeeder extends AbstractSeed
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
	'idpersonvideo' => '1',
	'idperson' => '116',
	'idvideo' => '1',
],
[
	'idpersonvideo' => '2',
	'idperson' => '307',
	'idvideo' => '3',
],
    	];

        $table = $this->table('personvideos');
        $table->insert($data)
              ->save();

    }
}
