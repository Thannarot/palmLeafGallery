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
    <link href="assets/style2.css" rel="stylesheet">
</head>
<?php
    include('inc/helper.php');
    //image directory
    $dir    = 'palm_leaf_multi';
    $dir9 = $dir.'/9/';
    $dir17 = $dir.'/17/';
    $dir33 = $dir.'/33/';
    //open text file
    $filename = "palm_multi_health.csv";
    //call ImportCSV2Array function to convert csv to array
    $csvArray = ImportCSV2Array($filename);
?>
<body>
<div class="container" style="padding-bottom: 50px;">
  <h2>Palm Leaf Gallery</h2>
  <a class="btn-success btn-sm" href="index.php">RGB Camera</a>
  <a class="btn-success btn-sm" href="multi-camera.php">Multi Camera</a>
  <hr>
<div class="col-md-12">
  <table id="imgTable2" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>HEALTH</th>
                <th>LEAF</th>
                <th>RGB</th>
                <th>GREEN</th>
                <th>RED</th>
                <th>RED EDGE</th>
                <th>NIR</th>
                <th>NDVI</th>
            </tr>
        </thead>
        <tbody>
          <?php for($i=1; $i<= sizeof($csvArray); $i++) { ?>
            <?php for($j=1; $j<4; $j++) {
              if($j==1){
                $leaf_dir = $dir9.$i.'/';
                $leaf = '9';
              }elseif ($j == 2) {
                $leaf_dir = $dir17.$i.'/';
                $leaf = '17';
              }elseif ($j == 3) {
                $leaf_dir = $dir33.$i.'/';
                $leaf = '33';
              }
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $csvArray[$i - 1]['health']; ?></td>
                <th><?php echo $leaf; ?></th>
                <td>
                  <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_RGB.JPG' ; ?>" data-caption="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_RGB.JPG' ; ?>" >
                      <img class="img-responsive" title="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_NIR.JPG' ; ?>" alt="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_NIR.JPG' ; ?>" src="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_RGB.JPG' ; ?>" />
                  </a>
                </td>
                <td>
                  <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_GRE.JPG' ; ?>" data-caption="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_GRE.JPG' ; ?>">
                      <img class="img-responsive" title="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_NIR.JPG' ; ?>" alt="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_NIR.JPG' ; ?>" src="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_GRE.JPG' ; ?>" />
                  </a>
                </td>
                <td>
                  <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_RED.JPG' ; ?>" data-caption="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_RED.JPG' ; ?>">
                      <img class="img-responsive" title="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_NIR.JPG' ; ?>" alt="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_NIR.JPG' ; ?>" src="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_RED.JPG' ; ?>" />
                  </a>
                </td>
                <td>
                  <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_REG.JPG' ; ?>" data-caption="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_REG.JPG' ; ?>">
                      <img class="img-responsive" title="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_NIR.JPG' ; ?>" alt="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_NIR.JPG' ; ?>" src="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_REG.JPG' ; ?>" />
                  </a>
                </td>
                <td>
                  <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_NIR.JPG' ; ?>" data-caption="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_NIR.JPG' ; ?>">
                      <img class="img-responsive" title="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_NIR.JPG' ; ?>" alt="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_NIR.JPG' ; ?>" src="<?php echo $leaf_dir.$csvArray[$i - 1]['ID'].'_NIR.JPG' ; ?>" />
                  </a>
                </td>
                <td><a class="btn-primary btn-sm" href="ndvi.php?id=<?php echo $csvArray[$i - 1]['ID'] ; ?>&leaf=<?php echo $leaf ; ?>&img=<?php echo $i ; ?>&healthy=<?php echo $csvArray[$i - 1]['health'] ; ?>"><span class="glyphicon glyphicon-picture"></span> Preview</a></td>
              </tr>
              <?php } ?>
          <?php } ?>
        </tbody>
    </table>
	</div>
</div>
</body>
</html>
