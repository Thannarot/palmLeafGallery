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
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="assets/script.js"></script>
    <link href="assets/style2.css" rel="stylesheet">
</head>
<?php
    include('inc/helper.php');
    //image directory
    $ID = $_GET['id'];
    $IMG= $_GET['img'];
    $LEAF = $_GET['leaf'];
    $HEALTHY = $_GET['healthy'];
    $dir_multi = 'palm_leaf_multi/'.$LEAF.'/'.$IMG.'/';
    $dir_ndvi_leaf    = 'ndvi/ndvi_leaf/'.$LEAF.'/'.$IMG.'/';
    $dir_reflectance = 'ndvi/reflectance/'.$LEAF.'/'.$IMG.'/';
    //open text file
    $filename_ndvi = 'ndvi-csv/'.$ID.'.csv';
    $filename_spectral = 'spectral-csv/'.$ID.'.csv';
    //call ImportCSV2Array function to convert csv to array
    $csvNDVIArray = ImportCSV2Array($filename_ndvi);
    $csvSpectralArray = ImportCSV2Array($filename_spectral);
?>
<body>
<div class="container" style="padding-bottom: 50px;">
  <h2>Palm Leaf Gallery</h2>
  <a class="btn-success btn-sm" href="index.php">RGB Camera</a>
  <a class="btn-success btn-sm" href="multi-camera.php">Multi Camera</a>
  <hr>
<div class="col-md-12">
<div class="row">
  <div class="col-md-3">
    <b>Image ID: <?php echo $ID ; ?></b>
    <b>Healthy: <?php echo $HEALTHY ; ?></b>
    <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir_multi.$ID.'_RGB.JPG' ; ?>" data-caption="<?php echo $dir_multi.$ID.'_RGB.JPG' ; ?>" >
        <img class="img-responsive" title="<?php echo $dir_multi.$ID.'_RGB.JPG' ; ?>" alt="" src="<?php echo $dir_multi.$ID.'_RGB.JPG' ; ?>" />
    </a>
  </div>
  <div class="col-md-9">
    <div class="col-md-12" style="background-color: #00c853; padding:10px; margin-bottom: 10px;">
      <b>Multi</b>
    </div>

    <div class="col-md-3">
      <div class='text-center'>
          <small class='text-muted'>Green</small>
      </div>
      <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir_multi.$ID.'_GRE.JPG' ; ?>" data-caption="<?php echo $dir_multi.$ID.'_GRE.JPG' ; ?>" >
          <img class="img-responsive" title="<?php echo $dir_multi.$ID.'_GRE.JPG' ; ?>" alt="" src="<?php echo $dir_multi.$ID.'_GRE.JPG' ; ?>" />
      </a>
    </div>

    <div class="col-md-3">
      <div class='text-center'>
          <small class='text-muted'>Red</small>
      </div>
      <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir_multi.$ID.'_RED.JPG' ; ?>" data-caption="<?php echo $dir_multi.$ID.'_RED.JPG' ; ?>" >
          <img class="img-responsive" title="<?php echo $dir_multi.$ID.'_RED.JPG' ; ?>" alt="" src="<?php echo $dir_multi.$ID.'_RED.JPG' ; ?>" />
      </a>
    </div>
    <div class="col-md-3">
      <div class='text-center'>
          <small class='text-muted'>Red Edge</small>
      </div>
      <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir_multi.$ID.'_REG.JPG' ; ?>" data-caption="<?php echo $dir_multi.$ID.'_REG.JPG' ; ?>" >
          <img class="img-responsive" title="<?php echo $dir_multi.$ID.'_REG.JPG' ; ?>" alt="" src="<?php echo $dir_multi.$ID.'_REG.JPG' ; ?>" />
      </a>
    </div>
    <div class="col-md-3">
      <div class='text-center'>
          <small class='text-muted'>NIR</small>
      </div>
      <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir_multi.$ID.'_NIR.JPG' ; ?>" data-caption="<?php echo $dir_multi.$ID.'_NIR.JPG' ; ?>" >
          <img class="img-responsive" title="<?php echo $dir_multi.$ID.'_NIR.JPG' ; ?>" alt="" src="<?php echo $dir_multi.$ID.'_NIR.JPG' ; ?>" />
      </a>
    </div>


    <div class="col-md-12" style="background-color: #0091ea; padding:10px; margin-bottom: 10px;">
      <b>Reflectance</b>
    </div>

    <div class="col-md-6">
      <div class="col-md-6">
        <div class='text-center'>
            <small class='text-muted'>Green</small>
        </div>
        <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir_reflectance.$ID.'_healthy_green.png' ; ?>" data-caption="<?php echo $dir_reflectance.$ID.'_healthy_green.png' ; ?>" >
            <img class="img-responsive" title="<?php echo $dir_reflectance.$ID.'_healthy_green.png' ; ?>" alt="" src="<?php echo $dir_reflectance.$ID.'_healthy_green.png' ; ?>" />
        </a>
      </div>
      <div class="col-md-6">
        <div class='text-center'>
            <small class='text-muted'>Red</small>
        </div>
        <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir_reflectance.$ID.'_healthy_red.png' ; ?>" data-caption="<?php echo $dir_reflectance.$ID.'_healthy_red.png' ; ?>" >
            <img class="img-responsive" title="<?php echo $dir_reflectance.$ID.'_healthy_red.png' ; ?>" alt="" src="<?php echo $dir_reflectance.$ID.'_healthy_red.png' ; ?>" />
        </a>
      </div>
      <div class="col-md-6">
        <div class='text-center'>
            <small class='text-muted'>Red Edge</small>
        </div>
        <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir_reflectance.$ID.'_healthy_reg.png' ; ?>" data-caption="<?php echo $dir_reflectance.$ID.'_healthy_reg.png' ; ?>" >
            <img class="img-responsive" title="<?php echo $dir_reflectance.$ID.'_healthy_reg.png' ; ?>" alt="" src="<?php echo $dir_reflectance.$ID.'_healthy_reg.png' ; ?>" />
        </a>
      </div>
      <div class="col-md-6">
        <div class='text-center'>
            <small class='text-muted'>center</small>
        </div>
        <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir_reflectance.$ID.'_healthy_nir.png' ; ?>" data-caption="<?php echo $dir_reflectance.$ID.'_healthy_nir.png' ; ?>" >
            <img class="img-responsive" title="<?php echo $dir_reflectance.$ID.'_healthy_nir.png' ; ?>" alt="" src="<?php echo $dir_reflectance.$ID.'_healthy_nir.png' ; ?>" />
        </a>
      </div>
    </div>
    <div class="col-md-6">
      <div id="chart-spectral"></div>
    </div>

    <div class="col-md-12" style="background-color: #feb300; padding:10px; margin-bottom: 10px;">
      <b>NDVI</b>
    </div>

    <div class="col-md-6">
      <div class="col-md-12">
          <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_1.png' ; ?>" data-caption="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_1.png' ; ?>" >
              <img class="img-responsive" title="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_1.png' ; ?>" alt="" src="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_1.png' ; ?>" />
          </a>
      </div>

      <div class="col-md-12">
          <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_2.png' ; ?>" data-caption="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_2.png' ; ?>" >
              <img class="img-responsive" title="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_2.png' ; ?>" alt="" src="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_2.png' ; ?>" />
          </a>
      </div>
      <div class="col-md-12">
          <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_3.png' ; ?>" data-caption="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_3.png' ; ?>" >
              <img class="img-responsive" title="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_3.png' ; ?>" alt="" src="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_3.png' ; ?>" />
          </a>
      </div>
      <div class="col-md-12">
          <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_4.png' ; ?>" data-caption="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_4.png' ; ?>" >
              <img class="img-responsive" title="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_4.png' ; ?>" alt="" src="<?php echo $dir_ndvi_leaf.$ID.'_NDVI_4.png' ; ?>" />
          </a>
      </div>

    </div>
    <div class="col-md-6">
      <div id="chart-ndvi"></div>
    </div>
  </div>





</div>
</div>
</div>
<script>


var min_series = [];
var max_series = [];
var mean_series = [];
var min_spectral_series = [];
var max_spectral_series = [];
var mean_spectral_series = [];
var img_id = <?php echo $ID ?>;
<?php for($i=1; $i<= sizeof($csvNDVIArray); $i++) { ?>
  min_series.push(<?php echo $csvNDVIArray[$i-1]['min'] ?>);
  max_series.push(<?php echo $csvNDVIArray[$i-1]['max'] ?>);
  mean_series.push(<?php echo $csvNDVIArray[$i-1]['mean'] ?>);
<?php } ?>
<?php for($i=1; $i<= sizeof($csvSpectralArray); $i++) { ?>
  min_spectral_series.push(<?php echo $csvSpectralArray[$i-1]['min'] ?>);
  max_spectral_series.push(<?php echo $csvSpectralArray[$i-1]['max'] ?>);
  mean_spectral_series.push(<?php echo $csvSpectralArray[$i-1]['mean'] ?>);
<?php } ?>
// Create the NDVI chart
Highcharts.chart('chart-ndvi', {

    title: {
        text: 'Normalized difference vegetation index'
    },

    subtitle: {
        text: 'image id: '+ img_id
    },

    yAxis: {
        title: {
            text: 'NDVI'
        }
    },
    xAxis: {
        categories: ['Leaf 1', 'Leaf 2', 'Leaf 3', 'Leaf 4']
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: true
            }
        }
    },

    series: [{
        name: 'Max',
        data: min_series
    }, {
        name: 'Min',
        data: max_series
    }, {
        name: 'Mean',
        data: mean_series
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});

// Create the NDVI chart
Highcharts.chart('chart-spectral', {

    title: {
        text: 'Spectral Reflectance'
    },

    subtitle: {
        text: 'image id: '+ img_id
    },

    yAxis: {
        title: {
            text: 'Spectral Reflectance'
        }
    },
    xAxis: {
        categories: ['Green', 'NIR', 'Red', 'Red Edge']
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: true
            }
        }
    },

    series: [{
        name: 'Max',
        data: min_spectral_series
    }, {
        name: 'Min',
        data: max_spectral_series
    }, {
        name: 'Mean',
        data: mean_spectral_series
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});

</script>
</body>
</html>
