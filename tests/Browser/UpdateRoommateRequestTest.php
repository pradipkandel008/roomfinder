<?php

namespace Tests\Browser;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
class UpdateRoommateRequestTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {      $this->browse(function (Browser $browser) {
           $browser->loginAs(User::find(6))
                    ->visit('/user/roommateregister')
                    ->assertSee('Post Roommate')
                    ->value('#first_name', 'Suman') 
                    ->value('#last_name', 'Pandey') 
                    ->value('#location', 'Buddhanagar')
                    ->value('#gender', 'Male') 
                    ->value('#dob', '1997/02/15')
                    ->value('#marital_status', 'Single')
                    ->value('#occupation', 'Student')
                    ->value('#no_of_rooms', '1')
                    ->value('#water_facility', '24 hours')
                    ->value('#parking', 'Yes')
                    ->value('#phone', '9843567891') 
                    ->value('#email', 'pradipkandel008@gmail.com')
                    ->value('#user', 'pradipkandel008@gmail.com')
                    ->click('button[type="submit"]') 
                    ->assertSee('Updated');  
        });
    }
}
