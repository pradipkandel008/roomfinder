<?php

namespace Tests\Browser;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class AcceptRequestTest extends DuskTestCase
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
                    ->visit('user/roommate/acceptroommate/4')
                    ->assertSee('Provide')
                    ->value('#first_name', 'Sudip')
                    ->value('#last_name', 'Sapkota') 
                    ->value('#gender', 'Male') 
                    ->value('#dob', '1997/02/15')
                    ->value('#marital_status', 'Single')
                    ->value('#occupation', 'Student')
                    ->value('#phone', '9805789741') 
                    ->value('#email', 'sudipsapkota@gmail.com')
                    ->value('#user', 'pradipkandel008@gmail.com')
                    ->value('#roommate_id','4')
                    ->click('button[type="submit"]')  
                    ->assertDontSee('Accepted');  
        });
    }
}
