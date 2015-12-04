<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function assertHTTPExceptionStatus($expectedStatusCode, Closure $codeThatShouldThrow)
    {
        try 
        {
            $codeThatShouldThrow($this);

            $this->assertFalse(true, "An HttpException should have been thrown by the provided Closure.");
        } 
        catch (Symfony\Component\HttpKernel\Exception\HttpException $e) 
        {
            // assertResponseStatus() won't work because the response object is null
            $this->assertEquals(
                $expectedStatusCode,
                $e->getStatusCode(),
                sprintf("Expected an HTTP status of %d but got %d.", $expectedStatusCode, $e->getStatusCode())
            );
        }
    }
}
