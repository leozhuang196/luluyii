<?php
    require_once("IpComponent.php");
    $iplocation = new IpComponent();
    $ipresult = $iplocation->getlocation('14.216.10.221');  
    print_r($ipresult); 
    
?>  
