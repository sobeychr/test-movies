<?php

use Illuminate\Http\RedirectResponse;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{
    protected function notFound(array $paths):void
    {
        foreach($paths as $entry)
        {
            $response = $this->call('GET', $entry);
            $this->assertEquals(404, $response->status());
        }
    }

    protected function redirects(array $paths, string $destination):void
    {
        foreach($paths as $entry)
        {
            $response = $this->call('GET', $entry);
            $this->assertEquals(302, $response->status());

            $this->assertInstanceOf(
                Illuminate\Http\RedirectResponse::class,
                $response
            );

            $redirected = $response->headers->get('location');
            $this->assertStringEndsWith($destination, $redirected);
        }
    }

    protected function routes(array $paths, array $contains):void
    {
        foreach($paths as $entry)
        {
            $response = $this->call('GET', $entry);
            $this->assertEquals(200, $response->status());
        }

        $content = $response->getContent();
        foreach($contains as $entry)
        {
            $this->assertStringContainsStringIgnoringCase($entry, $content);
        }
    }

    public function testHome():void
    {
        $paths = ['/', '/home'];
        $contains = [
            '<title>home</title>',
            '<h1>home</h1>',
            'home.css',
            '<link rel=\'icon\' href=\'/asset/image/favicon/favicon.png\'>',
        ];
        $this->routes($paths, $contains);
    }

    public function testMovieList():void
    {
        $paths = ['/movie'];
        $contains = [
            '<title>movie list</title>',
            '<h1>movie list</h1>',
            'list.css',
            '<link rel=\'icon\' href=\'/asset/image/favicon/favicon.png\'>',
        ];
        $this->routes($paths, $contains);
    }

    public function testMovieEntry():void
    {
        $redirects = [
            '/movie/1',
            '/movie/1/123',
            '/movie/1/12alpha3beta',
            '/movie/1/ttt',
        ];
        $destination = '/movie/1/or-sit-amet';
        $this->redirects($redirects, $destination);

        $contains = [
            '<title>or sit amet</title>',
            '<h1>or sit amet</h1>',
            'movie.css',
            '<link rel=\'icon\' href=\'/asset/image/favicon/favicon.png\'>',
        ];
        $this->routes([$destination], $contains);

        $invalid = [
            '/movie/123',
        ];
        $this->notFound($invalid);
    }

    public function testUserList():void
    {
        $paths = ['/user'];
        $contains = [
            '<title>user list</title>',
            '<h1>user list</h1>',
            'list.css',
            '<link rel=\'icon\' href=\'/asset/image/favicon/favicon.png\'>',
        ];
        $this->routes($paths, $contains);
    }

    public function testUserEntry():void
    {
        $redirects = [
            '/user/1',
            '/user/1/123',
            '/user/1/12alpha3beta',
            '/user/1/ttt',
        ];
        $destination = '/user/1/amal-blomvik';
        $this->redirects($redirects, $destination);

        $contains = [
            '<title>ms amal blomvik</title>',
            '<h1>ms amal blomvik</h1>',
            'user.css',
            '<link rel=\'icon\' href=\'/asset/image/favicon/favicon.png\'>',
        ];
        $this->routes([$destination], $contains);

        $invalid = [
            '/user/123',
        ];
        $this->notFound($invalid);
    }

    public function testTest():void
    {
        $this->get('/test');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }
}
