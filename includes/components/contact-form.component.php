<?php

namespace Components;

require_once './includes/Core/component.php';

use \Core\Component;


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







