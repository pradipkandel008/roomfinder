<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class PostQuestionTest extends DuskTestCase
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
                    ->visit('user/forum/question')
                    ->assertSee('Questions')
                    ->value('#title','Laravel')
                    ->value('#question','How difficult is Laravel?')
                    ->click('button[type="submit"]')  
                    ->assertSee('posted');  
        });
    }
}

