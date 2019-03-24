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
	'idvideo' => '1',
	'nmvideo' => 'Hank Aaron in NL',
	'nmurl' => 'ihJw4e4Q918',
	'nmphoto' => 'aaron.jpg',
	'ftdepicted' => 'Wim Hageman, Hank Aaron',
	'is_featured' => '1',
	'created_at' => '2019-03-24 09:23:54',
	'changed_by' => 'info@honkbalmuseum.nl',
],
[
	'idvideo' => '2',
	'nmvideo' => 'Peanuts bij Sport7',
	'nmurl' => 'rkp1yVeNrPE',
	'nmphoto' => 'hcaw_peanuts.jpg',
	'ftdepicted' => 'HCAW',
	'is_featured' => '1',
	'created_at' => '2019-03-24 09:23:54',
	'changed_by' => 'info@honkbalmuseum.nl',
],
[
	'idvideo' => '3',
	'nmvideo' => 'Win Remmerswaal',
	'nmurl' => 'DRR7FCVO3RU',
	'nmphoto' => 'remmerswaal.jpg',
	'ftdepicted' => 'Win Remmerswaal',
	'is_featured' => '1',
	'created_at' => '2019-03-24 09:23:54',
	'changed_by' => 'info@honkbalmuseum.nl',
],
[
	'idvideo' => '4',
	'nmvideo' => 'Novarra',
	'nmurl' => 'f5e1BTkwxuA',
	'nmphoto' => 'novarra.jpg',
	'ftdepicted' => 'Gijs Selderijk, Fred Makel',
	'is_featured' => '1',
	'created_at' => '2019-03-24 09:23:54',
	'changed_by' => 'info@honkbalmuseum.nl',
],
[
	'idvideo' => '5',
	'nmvideo' => 'HCAW 1976',
	'nmurl' => 'gdcw9HyPE2c',
	'nmphoto' => 'HCAW_1976.jpg',
	'ftdepicted' => 'Loes Poort',
	'is_featured' => '1',
	'created_at' => '2019-03-24 09:23:54',
	'changed_by' => 'info@honkbalmuseum.nl',
],

    	];

        $table = $this->table('videos');
        $table->insert($data)
              ->save();

    }
}
