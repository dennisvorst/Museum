<?php


use Phinx\Seed\AbstractSeed;

class VideosSeeder extends AbstractSeed
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
	'id' => '1',
	'nmvideo' => 'Hank Aaron in NL',
	'nmurl' => 'ihJw4e4Q918',
	'ftdepicted' => 'Wim Hageman, Hank Aaron',
	'is_featured' => '1',
	'created_at' => '2019-03-24 09:23:54',
	'updated_by' => 'info@honkbalmuseum.nl',
],
[
	'id' => '2',
	'nmvideo' => 'Peanuts bij Sport7',
	'nmurl' => 'rkp1yVeNrPE',
	'ftdepicted' => 'HCAW',
	'is_featured' => '1',
	'created_at' => '2019-03-24 09:23:54',
	'updated_by' => 'info@honkbalmuseum.nl',
],
[
	'id' => '3',
	'nmvideo' => 'Win Remmerswaal',
	'nmurl' => 'DRR7FCVO3RU',
	'ftdepicted' => 'Win Remmerswaal',
	'is_featured' => '1',
	'created_at' => '2019-03-24 09:23:54',
	'updated_by' => 'info@honkbalmuseum.nl',
],
[
	'id' => '4',
	'nmvideo' => 'Novarra',
	'nmurl' => 'f5e1BTkwxuA',
	'ftdepicted' => 'Gijs Selderijk, Fred Makel',
	'is_featured' => '1',
	'created_at' => '2019-03-24 09:23:54',
	'updated_by' => 'info@honkbalmuseum.nl',
],
[
	'id' => '5',
	'nmvideo' => 'HCAW 1976',
	'nmurl' => 'gdcw9HyPE2c',
	'ftdepicted' => 'Loes Poort',
	'is_featured' => '1',
	'created_at' => '2019-03-24 09:23:54',
	'updated_by' => 'info@honkbalmuseum.nl',
],

    	];

        $table = $this->table('videos');
        $table->insert($data)
              ->save();

    }
}
