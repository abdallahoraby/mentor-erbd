<?php namespace Tests\Repositories;

use App\Models\CustomField;
use App\Repositories\CustomFieldRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CustomFieldRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CustomFieldRepository
     */
    protected $customFieldRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->customFieldRepo = \App::make(CustomFieldRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_custom_field()
    {
        $customField = CustomField::factory()->make()->toArray();

        $createdCustomField = $this->customFieldRepo->create($customField);

        $createdCustomField = $createdCustomField->toArray();
        $this->assertArrayHasKey('id', $createdCustomField);
        $this->assertNotNull($createdCustomField['id'], 'Created CustomField must have id specified');
        $this->assertNotNull(CustomField::find($createdCustomField['id']), 'CustomField with given id must be in DB');
        $this->assertModelData($customField, $createdCustomField);
    }

    /**
     * @test read
     */
    public function test_read_custom_field()
    {
        $customField = CustomField::factory()->create();

        $dbCustomField = $this->customFieldRepo->find($customField->id);

        $dbCustomField = $dbCustomField->toArray();
        $this->assertModelData($customField->toArray(), $dbCustomField);
    }

    /**
     * @test update
     */
    public function test_update_custom_field()
    {
        $customField = CustomField::factory()->create();
        $fakeCustomField = CustomField::factory()->make()->toArray();

        $updatedCustomField = $this->customFieldRepo->update($fakeCustomField, $customField->id);

        $this->assertModelData($fakeCustomField, $updatedCustomField->toArray());
        $dbCustomField = $this->customFieldRepo->find($customField->id);
        $this->assertModelData($fakeCustomField, $dbCustomField->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_custom_field()
    {
        $customField = CustomField::factory()->create();

        $resp = $this->customFieldRepo->delete($customField->id);

        $this->assertTrue($resp);
        $this->assertNull(CustomField::find($customField->id), 'CustomField should not exist in DB');
    }
}
