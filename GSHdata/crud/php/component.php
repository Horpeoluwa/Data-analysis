<?php

function inputElement($icon,$placeholder,$name,$value){

  $ele= "  


  <div class=\"input-group mb-2\">
  <div class=\"input-group-prepend\">
       <div class=\"input-group-text bg-warning\">$icon</i></div>
  </div>
  <input type=\"text\" name = \"$name\" value =\"$value\" autocomplete=\"off\" placeholder=\"$placeholder\" 
  class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"Username\">
  </div>
  </div>
  
  

";

echo $ele;

}

function txtarea($icon,$placeholder,$name,$value){
    $txt = "
    <div class=\"form-group\">
  <label for=\"exampleFormControlTextarea1 txtarea\">$icon</i><b>TREATMENT</b> </label>
  <textarea class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"3\" placeholder=\"$placeholder\" name=\"$name\" value=\"$value\"></textarea>
  </div>
    
    ";
echo $txt;
}


function buttonElement($btnid,$styleclass,$text,$name,$attr){
  $btn= "
    <button name= '$name' '$attr' class='$styleclass' id='$btnid'>$text</button>
  
  ";

  echo $btn;

}

?>

