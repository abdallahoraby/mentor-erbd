<?php namespace Tests\Repositories;

use App\Models\Inquiry;
use App\Repositories\InquiryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class InquiryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var InquiryRepository
     */
    protected $inquiryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->inquiryRepo = \App::make(InquiryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_inquiry()
    {
        $inquiry = Inquiry::factory()->make()->toArray();

        $createdInquiry = $this->inquiryRepo->create($inquiry);

        $createdInquiry = $createdInquiry->toArray();
        $this->assertArrayHasKey('id', $createdInquiry);
        $this->assertNotNull($createdInquiry['id'], 'Created Inquiry must have id specified');
        $this->assertNotNull(Inquiry::find($createdInquiry['id']), 'Inquiry with given id must be in DB');
        $this->assertModelData($inquiry, $createdInquiry);
    }

    /**
     * @test read
     */
    public function test_read_inquiry()
    {
        $inquiry = Inquiry::factory()->create();

        $dbInquiry = $this->inquiryRepo->find($inquiry->id);

        $dbInquiry = $dbInquiry->toArray();
        $this->assertModelData($inquiry->toArray(), $dbInquiry);
    }

    /**
     * @test update
     */
    public function test_update_inquiry()
    {
        $inquiry = Inquiry::factory()->create();
        $fakeInquiry = Inquiry::factory()->make()->toArray();

        $updatedInquiry = $this->inquiryRepo->update($fakeInquiry, $inquiry->id);

        $this->assertModelData($fakeInquiry, $updatedInquiry->toArray());
        $dbInquiry = $this->inquiryRepo->find($inquiry->id);
        $this->assertModelData($fakeInquiry, $dbInquiry->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_inquiry()
    {
        $inquiry = Inquiry::factory()->create();

        $resp = $this->inquiryRepo->delete($inquiry->id);

        $this->assertTrue($resp);
        $this->assertNull(Inquiry::find($inquiry->id), 'Inquiry should not exist in DB');
    }
}
