<?php
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once("./view/components/header.php");?>
    <meta charset="utf-8" />
    <title><?php echo "probLEm_sEt - 0n1in3 Judg3";?></title>

    
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> -->
</head>
<body>
    <?php require("./view/components/navbar.php"); ?>
<table class="table">
    <thead class="thead-light">
        <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        </tr>
    </tbody>
</table>
            <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="First group">
                    <?php
                        $totalpages = 1 + ($totalcnt / 50); 
                        for($i = 1; $i <= $totalpages; $i++) {
                            echo "<button type='button' class='btn btn-secondary mb-3'>{$i}</button>";
                        }
                    ?>
                    <button type="button" class="btn btn-secondary mb-3">1</button>
                    <button type="button" class="btn btn-secondary mb-3">2</button>
                    <button type="button" class="btn btn-secondary mb-3">3</button>
                    <button type="button" class="btn btn-secondary mb-3">4</button>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Button</button>
                    </div>
                </div>
            </div>

            <div class="row">
				<div class="col-md-12">
					<table class="table table-striped table-hover" id="tableID">
						<thead>
							<tr>
								<th width="5%">AC</th>
								<th width="5%">ID</th>
								<th width="40%"><?php echo "Problem Title";?></th>
								<th width="20%"><?php echo "Difficuty";?></th>
								<th width="16%"><?php echo "Source";?></th>
								<th width="14%"><?php echo "AC / "."Total";?></th>
							</tr>
						</thead>
						<tbody id="oj-ps-problemlist">
							<tr>
                            <td>Loading...</td>
                            </tr>
                            <?php
                                foreach ( $problemlist as $row) {
                                    echo "<tr>";
                                        echo "<td>".""."</td>";
                                        echo "<td>"."{$row['problem_id']}"."</td>";
                                        echo "<td><a href='problem.php?pid={$row['problem_id']}' >". 
                                            "{$row['title']}"."</a></td>";
                                        if(floatval($row['submit'])==0) {
                                            $percent = "-";
                                        }
                                        else {
                                            $percent = (floatval($row['accepted']) / floatval($row['submit']))*100;   
                                        }
                                        echo "<td>"."<div class='progress maxwidth150px'><div class='progress-bar progress-bar-striped' style='width: {$percent}%;'></div></div>"."</td>";
                                        echo "<td>"."{$row['source']}"."</td>";
                                        echo "<td>"."({$row['accepted']}/{$row['submit']}) {$percent}%"."</td>";
                                    echo "</tr>";
                                }
                            ?>
						</tbody>
					</table>
				</div>
            </div>
</body>
</html>