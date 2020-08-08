 <script>
  $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
  
    /* END AREA CHART */

    /*
     * BAR CHART
     * ---------
     */
      <?php $total = 0; 
      foreach ($totalpenjualan as $totalpenjualan) {
        $total += $totalpenjualan->total;
      }

      $total1 = 0; 
      foreach ($penjualan1 as $penjualan1) {
        $total1 += $penjualan1->total;
      }

      $total2 = 0; 
      foreach ($penjualan2 as $penjualan2) {
        $total2 += $penjualan2->totaljual;
      }

      // $total3 = 0; 
      // foreach ($penjualan3 as $penjualan3) {
      //   $total3 += $penjualan3->total;
      // }
      // $total4 = 0; 
      // foreach ($penjualan4 as $penjualan4) {
      //   $total4 += $penjualan4->total;
      // }
      // $total5 = 0; 
      // foreach ($penjualan5 as $penjualan5) {
      //   $total5 += $penjualan5->total;
      // }
      ?>

    var bar_data = {
      data : [['<?php echo date('F Y', strtotime(date('Y-m') . '- 5 month')); ?>', <?php echo '0';// $total5 ?>], ['<?php echo date('F Y', strtotime(date('Y-m') . '- 4 month')); ?>', <?php echo '0';// $total4 ?>], ['<?php echo date('F Y', strtotime(date('Y-m') . '- 3 month')); ?>', <?php echo '0';// $total3 ?>], ['<?php echo date('F Y', strtotime(date('Y-m') . '- 2 month')); ?>', <?php echo $total2; ?>], ['<?php echo date('F Y', strtotime(date('Y-m') . '- 1 month')); ?>', <?php echo $total1 ?>], ['<?php echo date('F Y') ?>', <?php echo $total ?>]],
      color: '#3c8dbc'
    };
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    });
    /* END BAR CHART */

    /*
     * DONUT CHART
     * -----------
     */
    /*
     * END DONUT CHART
     */

  });

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>