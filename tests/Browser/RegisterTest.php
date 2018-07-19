<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/user/register')
                ->assertSee('User Register')
                ->value('#first_name', 'Pradip')
                ->value('#last_name', 'Kandel')
                ->value('#gender', 'Male')
                ->value('#phone', '9803144550')
                ->value('#email', 'pradipkandel008@gmail.com')
                ->value('#user_name', 'pradip')
                ->value('#password', '123456')
                ->value('#password-confirm', '123456')
                ->click('button[type="submit"]')
                ->assertPathIs('/user/register')
                ->assertSee('Registered');
        });
    }
}
