<?php   
function getIpPlace($ip){  
    require_once("IpLocation.php");//加载类文件IpLocation.php  
    $ipfile = "qqwry.dat";      //获取ip对应地区的信息文件  
    $iplocation = new IpLocation($ipfile);  //new IpLocation($ipfile) $ipfile ip对应地区信息文件  
    $ipresult = $iplocation->getlocation($ip); //根据ip地址获得地区 getlocation("ip地区")  
    return $ipresult;  
}  
print_r(getIpPlace('14.17.34.182')); //调用方法  
?>  
