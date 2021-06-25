<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PersonViewTest extends TestCase
{
	public function testClassPersonViewExists()
    {
        $this->assertTrue(class_exists("PersonView"));
    }

    /** thumbnail tests */
	public function testThumbnailWithoutSurname()
    {
        $expected = "
		<div class='card'>
			<div class='container'>
				<div class='row'>
					<div class='col'>
						<div align='center'>
							<figure>
								<img width='150' height='150' border='0' src='./images/unknown.png'/>
								<figcaption>
									<a href='index.php?option=person&id=1'>Jake Roberts</a>
								</figcaption>
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
		";

        $person['id'] = "1";
		$person['firstName'] = "Jake";
		$person['lastName'] = "Roberts";
		$person['nickname'] = "The Snake";
        $person['person'] = $person;

        $object = new PersonView(json_encode($person));
        $actual = $object->showThumbnail();


        $this->assertEquals($expected, $actual);
    }

	public function testThumbnailWithSurname()
    {
		$expected = "
		<div class='card'>
			<div class='container'>
				<div class='row'>
					<div class='col'>
						<div align='center'>
							<figure>
								<img width='150' height='150' border='0' src='./images/unknown.png'/>
								<figcaption>
									<a href='index.php?option=person&id=2'>Sacha Baron Cohen</a>
								</figcaption>
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
		";

        $person['id'] = "2";
		$person['firstName'] = "Sacha";
        $person['surName'] = "Baron";
		$person['lastName'] = "Cohen";
        $person['person'] = $person;

        $object = new PersonView(json_encode($person));
        $actual = $object->showThumbnail();


        $this->assertEquals($expected, $actual);
        
    }

    public function testThumbnailWithPhotos()
    {
		$expected = "
		<div class='card'>
			<div class='container'>
				<div class='row'>
					<div class='col'>
						<div align='center'>
							<figure>
								<img width='150' height='150' border='0' src='./images/123.jpg'/>
								<figcaption>
									<a href='index.php?option=person&id=2'>Sacha Baron Cohen</a>
								</figcaption>
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
		";

		$person['id'] = "2";
		$person['firstName'] = "Sacha";
        $person['surName'] = "Baron";
		$person['lastName'] = "Cohen";
        $person['person'] = $person;

        $photo['id'] = 123;
        $photo['isMugshot'] = true;

        $person['photos'] = [$photo];

        $object = new PersonView(json_encode($person));
        $actual = $object->showThumbnail();


        $this->assertEquals($expected, $actual);
        
    }

}