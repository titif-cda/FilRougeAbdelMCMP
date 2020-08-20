<?php

namespace Components;



class ContactFormComponent extends Component
{
    public function render()
    {
        $myMain = include "./includes/tempt/contact-form.php";
        echo "<main>";
        $myMain;
        echo"</main>";
    }
}







