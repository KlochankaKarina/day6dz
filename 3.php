<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Розклад автобусів</title>
    <link rel="stylesheet" href="1.css">
</head>
<body>
    <h1>Оберіть станцію відправки:</h1>
    <p>
    <button><a href="?from=primiske">З Приміського</a></button></p>
   
    <p><button><a href="?from=bogdana">З Богдана</a></button>
</p>
    
    <?php 
    $cur_time = date("H:i");
    
    echo "Поточний час: ".$cur_time;
    
    function get_hours($time) {
        $res = $time[0] . $time[1];
        return (int) $res;
    }
    
    function get_minutes($time) {
        $res = $time[3] . $time[4];
        return (int) $res;
    }
    if($_GET['from']  == 'primiske'){
        $file = file('from_primiske.csv');
    }
    
    if($_GET['from']  == 'bogdana'){
        $file = file('from_bogdana.csv');
    }
    
    if(isset($_GET['from'])){
        foreach($file as $row) {
            $time = explode(",", $row);
            $go = $time[0];
            $went = $time[1];
            if(get_hours($cur_time)==get_hours($time[0])&&get_minutes($cur_time)<=get_minutes($time[0])){
            echo "<br> ваш автобус відправляється в {$time[0]} і прибуває в {$time[1]}";
                die();
            }
        }
    }
    ?>
</body>
</html>