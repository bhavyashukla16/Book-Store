<?php 
    function inputElement($icon, $placeholder, $name, $value){

        $element = " 
                        <div class=\"input-group mb-2\">
                            <div class=\"input-group-text bg-warning\">
                            $icon
                            </div>
                        <input type=\"text\" class=\"form-control\" 
                        name='$name'
                        value='$value'
                        autocomplete=\"off\"
                        id=\"inlineFormInputGroup\" placeholder='$placeholder'>
                        </div>
        
        ";
        echo $element;
    }

    function buttonElement($name, $btnid, $styleclass, $text, $attr){

        $btn ="  <button name='$name''$attr' id='$btnid' class='$styleclass'>$text</button>
            
        ";

        echo $btn;
    }

?>