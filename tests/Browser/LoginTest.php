<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/user/login')
                    ->assertSee('User Login')
                    ->value('#email', 'pradipkandel008@gmail.com')
                    ->value('#password', '123456')
                    ->click('button[type="submit"]') 
                    ->assertPathIs('/user') 
                    ->assertSee('FORUM');   
        });
    }
}
