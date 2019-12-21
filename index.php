<!DOCTYPE html>
<html lang="en">
<head>
    <title>Palm Leaf Gallery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="assets/script.js"></script>
    <link href="assets/style.css" rel="stylesheet">
</head>
<?php
    include('inc/helper.php');
    //image directory
    $dir    = 'palm_leaf';
    $dir9 = $dir.'/9/';
    $dir17 = $dir.'/17/';
    $dir33 = $dir.'/33/';
    //open text file
    $filename = "palm_health.csv";
    //call ImportCSV2Array function to convert csv to array
    $csvArray = ImportCSV2Array($filename);


?>
<body>
<div class="container" style="padding-bottom: 50px;">
  <h2>Palm Leaf Gallery</h2>
  <a class="btn-success btn-sm" href="index.php">RGB Camera</a>
  <a class="btn-success btn-sm" href="multi-camera.php">Multi Camera</a>
  <hr>

  <table id="imgTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>HEALTH</th>
                <th>LEAF 9</th>
                <th>LEAF 17</th>
                <th>LEAF 33</th>
            </tr>
        </thead>
        <tbody>
          <?php for($i=1; $i<= sizeof($csvArray); $i++) { ?>
                <td><?php echo $i; ?></td>
                <td><?php echo $csvArray[$i - 1]['health']; ?></td>
                <td>
                  <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir9.$i.'.JPG' ; ?>" data-caption="<?php echo $dir9.$i.'.JPG' ; ?>" >
                      <img class="img-responsive" alt="" src="<?php echo $dir9.$i.'.JPG' ; ?>" />
                      <div class='text-right'>
                          <small class='text-muted'><?php echo $dir9.$i.'.JPG' ; ?></small>
                      </div>
                  </a>
                </td>
                <td>
                  <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir17.$i.'.JPG' ; ?>" data-caption="<?php echo $dir17.$i.'.JPG' ; ?>">
                      <img class="img-responsive" alt="" src="<?php echo $dir17.$i.'.JPG' ; ?>" />
                      <div class='text-right'>
                          <small class='text-muted'><?php echo $dir17.$i.'.JPG' ; ?></small>
                      </div>
                  </a>
                </td>
                <td>
                  <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir33.$i.'.JPG' ; ?>" data-caption="<?php echo $dir33.$i.'.JPG' ; ?>">
                      <img class="img-responsive" alt="" src="<?php echo $dir33.$i.'.JPG' ; ?>" />
                      <div class='text-right'>
                          <small class='text-muted'><?php echo $dir33.$i.'.JPG' ; ?></small>
                      </div>
                  </a>
                </td>
              </tr>
          <?php } ?>
        </tbody>
    </table>
	</div>
</body>
</html>
