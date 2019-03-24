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
	'created_at' => '2019-03-24 09:21:11',
	'changed_by' => 'info@honkbalmuseum.nl',
],
[
	'idpersonvideo' => '2',
	'idperson' => '307',
	'idvideo' => '3',
	'created_at' => '2019-03-24 09:21:11',
	'changed_by' => 'info@honkbalmuseum.nl',
],
    	];

        $table = $this->table('personvideos');
        $table->insert($data)
              ->save();

    }
}
