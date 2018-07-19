<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class PostFeedbackTest extends DuskTestCase
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
                    ->visit('user/about')
                    ->assertSee('Feedback')
                    ->value('#first_name','Dinesh')
                    ->value('#last_name','Shrestha')
                    ->value('#feedback','UI is not good')
                    ->value('#email','dshrestha@gmail.com')
                    ->value('#phone','9841548962')
                    ->value('#website','')
                    ->click('button[type="submit"]')  
                    ->assertSee('posted');  
        });
    }
}
