<?php
if(isset($_POST['country'])){
    $country=$_POST['country'];
    if($country==="UK"){
        $price=$_POST['price'];
        $total=($price+100)+0.25*($price+100);
        echo $total;
    }else if($country==="rwanda"){
        $price=$_POST['price'];
        $ship_cost=$_POST['ship_cost'];
        $t=$price+$ship_cost;
        if($t<=250){
            $total=($price+$ship_cost+2) +(0.27*($price+$ship_cost+2));
            echo $total;
        }else if($t>250){
            $total=($price+$ship_cost+2) +(0.22*($price+$ship_cost+2));
            echo $total;
        }
    }else if($country==="United states"){
        $price=$_POST['price'];
        $weight=$_POST['weight'];

        if($weight>=30){
            $t=($price+($weight*13));
            if($t<=250){
                $total=$t+(0.27*$t);
                echo $total;
            }else if($t>250){
                $total=$t+(0.22*$t);
                echo $total;
            }
        }else if($weight>=0&&$weight<=0.7){
            $total=($price+44)+0.27*($price+44);
            echo $total;
        }else if($weight>0.7&&$weight<=1.1){
            $total=($price+56)+0.27*($price+56);
            echo $total;
        }else if($weight>1.1&&$weight<=1.7){
            $total=($price+61)+0.27*($price+61);
            echo $total;
        }else if($weight>1.7&&$weight<=2){
            $total=($price+61.5)+0.27*($price+61.5);
            echo $total;
        }else if($weight>2&&$weight<=2.6){
            $total=($price+64)+0.27*($price+64);
            echo $total;
        }else if($weight>2.6&&$weight<=3.4){
            $total=($price+68)+0.27*($price+68);
            echo $total;
        }else if($weight>3.4&&$weight<=4.2){
            $total=($price+78)+0.27*($price+78);
            echo $total;
        }else if($weight>4.2&&$weight<=5){
            $total=($price+96)+0.27*($price+96);
            echo $total;
        }else if($weight>5&&$weight<=5.6){
            $total=($price+101)+0.27*($price+101);
            echo $total;
        }else if($weight>5.6&&$weight<=6){
            $total=($price+110)+0.27*($price+110);
            echo $total;
        }else if($weight>6&&$weight<=6.8){
            $total=($price+114)+0.27*($price+114);
            echo $total;
        }else if($weight>6.8&&$weight<=7.3){
            $total=($price+116)+0.27*($price+116);
            echo $total;
        }else if($weight>7.3&&$weight<=7.5){
            $total=($price+124)+0.27*($price+124);
            echo $total;
        }else if($weight>7.5&&$weight<=7.9){
            $total=($price+125)+0.27*($price+125);
            echo $total;
        }else if($weight>7.9&&$weight<=8.8){
            $total=($price+134)+0.27*($price+134);
            echo $total;
        }else if($weight>8.8&&$weight<=9){
            $total=($price+136)+0.27*($price+136);
            echo $total;
        }else if($weight>9&&$weight<=9.5){
            $total=($price+148)+0.27*($price+148);
            echo $total;
        }else if($weight>9.5&&$weight<=9.9){
            $total=($price+154)+0.27*($price+154);
            echo $total;
        }else if($weight>9.9&&$weight<=10.4){
            $total=($price+159)+0.27*($price+159);
            echo $total;
        }else if($weight>10.4&&$weight<=10.8){
            $total=($price+165)+0.27*($price+165);
            echo $total;
        }else if($weight>10.4&&$weight<=11.3){
            $total=($price+173)+0.27*($price+173);
            echo $total;
        }else if($weight>11.3&&$weight<=15){
            $t=($price+($weight*15));
            if($t<=250){
                $total=$t+(0.27*$t);
                echo $total;
            }else if($t>250){
                $total=$t+(0.22*$t);
                echo $total;
            } 
        }else if($weight>15&&$weight<=20){
            $t=($price+($weight*14.5));
            if($t<=250){
                $total=$t+(0.27*$t);
                echo $total;
            }else if($t>250){
                $total=$t+(0.22*$t);
                echo $total;
            } 
        }else if($weight>20&&$weight<=25){
            $t=($price+($weight*13.5));
            if($t<=250){
                $total=$t+(0.27*$t);
                echo $total;
            }else if($t>250){
                $total=$t+(0.22*$t);
                echo $total;
            } 
        }else if($weight>25&&$weight<=30){
            $t=($price+($weight*13));
            if($t<=250){
                $total=$t+(0.27*$t);
                echo $total;
            }else if($t>250){
                $total=$t+(0.22*$t);
                echo $total;
            } 
        }
    }

}
?>