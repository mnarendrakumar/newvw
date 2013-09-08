<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function generateCustID($application_id)
{
    $appid = str_pad($application_id,10,'0',STR_PAD_LEFT);
    $appid = $appid.date('dmY');
    return $appid;
}
?>
