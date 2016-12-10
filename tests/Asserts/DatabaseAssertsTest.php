<?php

use Illuminated\Testing\Asserts\DatabaseAsserts;

class DatabaseAssertsTest extends TestCase
{
    use DatabaseAsserts;

    protected function setUp()
    {
        parent::setUp();

        $this->setUpDatabase();
        $this->setUpFactories();
        $this->loadMigrations();
        $this->seedDatabase();
    }

    protected function setUpDatabase()
    {
        config(['database.default' => 'testing']);
    }

    private function setUpFactories()
    {
        $this->withFactories(__DIR__ . '/../fixture/database/factories');
    }

    private function loadMigrations()
    {
        $this->loadMigrationsFrom([
            '--database' => 'testing',
            '--realpath' => __DIR__ . '/../fixture/database/migrations',
        ]);
    }

    private function seedDatabase()
    {
        factory(Post::class)->create(['title' => 'First Post!']);
        factory(Post::class)->create(['title' => 'Second Post!']);
        factory(Post::class)->create(['title' => 'Third Post!']);
    }

    /** @test */
    public function it_has_see_in_database_many_assertion()
    {
        $this->seeInDatabaseMany('posts', [
            ['title' => 'First Post!'],
            ['title' => 'Second Post!'],
            ['title' => 'Third Post!'],
        ]);
    }
}
