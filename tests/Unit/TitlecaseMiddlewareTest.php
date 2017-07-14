<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Middleware\TitlecaseMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TitlecaseMiddlewareTest extends TestCase
{
    /** @test */
    public function titles_are_set_to_titlecase()
    {
        $request = new Request;

        $request->merge([
            'title' => 'Title is in mixed CASE'
        ]);

        $middleware = new TitlecaseMiddleware;

        $middleware->handle($request, function ($req) {
            $this->assertEquals('Title Is In Mixed Case', $req->title);
        });
    }
}
