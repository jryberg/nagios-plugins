<?php
$def[1] = "";
$opt[1] = "";
foreach ( $DS as $KEY => $VAL ){
        $opt[1] .= "--alt-y-grid -l 0 --vertical-label salt-minions -l0  --title \"salt-minion End-To-End test - $hostname / $servicedesc\" ";
        $def[1] .= "DEF:var_float$KEY=$RRDFILE[$KEY]:$DS[$KEY]:MAX " ;
        $def[1] .= "CDEF:var$KEY=var_float$KEY,FLOOR " ;
        if ($KEY == "1") {
          $def[1] .= "AREA:var$KEY#60ba46:\"$LABEL[$KEY]\" " ;
        }
        if ($KEY == "2") {
          $def[1] .= "AREA:var$KEY#ff0000:\"$LABEL[$KEY]\" " ;
        }
        $def[1] .= "GPRINT:var$KEY:LAST:\"%.0lf $UNIT[$KEY]\\n\" ";
}
?>
