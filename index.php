<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Name project</title>
</head>
<body>
    <form action="index.php" method="POST">
        <div class="form-group">
            <label for="">Input Angka</label>
            <br>
            <input type="text" name="inputAngka" id="inputAngka" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <button type="submit" name="type" id="segitiga" value="segitiga">Generate Segitiga</button>
            <button type="submit" name="type" id="prima" value="prima">Generate Bilangan Prima</button>
            <button type="submit" name="type" id="ganjil" value="ganjil">Generate bilangan ganjil</button>
        </div>
    </form>
    <?php 

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $bType = $_POST['type'];
        $reqInput = $_POST['inputAngka'];
    
        if($bType === 'segitiga'){
            $number = $reqInput;
            $digits = str_split($number);
            $rows = count($digits);

        }elseif($bType === 'prima'){
            $prima = array();
            $num = 2;
            while (count($prima) === $reqInput) {
            $is_prime = true;
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i == 0) {
                $is_prime = false;
                break;
                }
            }
            if ($is_prime) {
                $prima[] = $num;
            }
            $num++;
            }
            $result = $prima;
        }elseif($bType === 'ganjil'){
            for ($i = 1; $i <= $reqInput * 1; $i += 2) {
                $result[] = $i;
              }
        }else{
            echo "Type tidak valid";
        }
    }
    ?>
    <br>
    <h3>Result : </h3>
    <?php if(isset($result)) : ?>
        <?php
            foreach($result as $has) :
        ?>
        <p><?php echo $has ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if(isset($digits)): ?>
        <!-- <h3>Segitiga:</h3> -->
        <?php for($i=0; $i<$rows; $i++): ?>
            <?php for($j=0; $j<=$i; $j++): ?>
            <?php echo $digits[$j] . " "; ?>
            <?php endfor; ?>
            <br>
        <?php endfor; ?>
        <?php endif; ?>
</body>
</html>