<?php


use Phinx\Seed\AbstractSeed;

class ClubvideosSeeder extends AbstractSeed
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

    	];

        $table = $this->table('clubvideos');
        $table->insert($data)
              ->save();

    }
}