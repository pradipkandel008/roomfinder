<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class PostAnswerTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(6))
                    ->visit('user/forum/question/answer/9')
                    ->assertSee('Answer')
                    ->value('#answer','Very difficult')
                    ->click('button[type="submit"]')  
                    ->assertSee('posted');  
        });
    }
}


