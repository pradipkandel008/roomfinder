<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class BookRoomTest extends DuskTestCase
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
                    ->visit('user/room/bookroom/3')
                    ->assertSee('Provide')
                    ->value('#first_name', 'Rahul')
                    ->value('#last_name', 'Ghimire') 
                    ->value('#gender', 'Male') 
                    ->value('#dob', '1997/02/15')
                    ->value('#marital_status', 'Single')
                    ->value('#occupation', 'Student')
                    ->value('#phone', '9841714598') 
                    ->value('#email', 'rahulgmr@@gmail.com')
                    ->value('#user', 'pradipkandel008@gmail.com')
                    ->value('#room_id','3')
                    ->click('button[type="submit"]')  
                    ->assertSee('Booked');  
        });
    }
}
