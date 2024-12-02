try {

  Apex.tooltip = {
    theme: 'dark'
  }

/*
    ==============================
    |    @Options Charts Script   |
    ==============================
*/

/*
    =============================
        Daily Sales | Options
    =============================
*/
var d_2options1 = {
  chart: {
        height: 160,
        type: 'bar',
        stacked: true,
        stackType: '100%',
        toolbar: {
          show: false,
        }
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        show: true,
        width: 1,
    },
    colors: ['#e2a03f', '#e0e6ed'],
    responsive: [{
        breakpoint: 480,
        options: {
            legend: {
                position: 'bottom',
                offsetX: -10,
                offsetY: 0
            }
        }
    }],
    series: [{
        name: 'Sales',
        data: [0, 0, 100, 67, 22, 43, 21]
    },{
        name: 'Last Week',
        data: [0, 0, 0, 0, 13, 27, 33]
    }],
    xaxis: {
        labels: {
            show: false,
        },
        categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'],
    },
    yaxis: {
        show: false
    },
    fill: {
        opacity: 1
    },
    plotOptions: {
        bar: {
            horizontal: false,
            endingShape: 'rounded',
            columnWidth: '25%',
        }
    },
    legend: {
        show: false,
    },
    grid: {
        show: false,
        xaxis: {
            lines: {
                show: false
            }
        },
        padding: {
          top: 10,
          right: 0,
          bottom: -40,
          left: 0
        }, 
    },
}

/*
    =============================
        Total Orders | Options
    =============================
*/
var d_2options2 = {
  chart: {
    id: 'sparkline1',
    group: 'sparklines',
    type: 'area',
    height: 280,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
      curve: 'smooth',
      width: 2
  },
  fill: {
    opacity: 1,
  },
  series: [{
    name: 'Sales',
    data: [100, 25, 36, 52, 38, 60, 38, 52, 36, 40]
  }],
  labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
  yaxis: {
    min: 0
  },
  grid: {
    padding: {
      top: 125,
      right: 0,
      bottom: 36,
      left: 0
    }, 
  },
  fill: {
      type:"gradient",
      gradient: {
          type: "vertical",
          shadeIntensity: 1,
          inverseColors: !1,
          opacityFrom: .40,
          opacityTo: .05,
          stops: [45, 100]
      }
  },
  tooltip: {
    x: {
      show: false,
    },
    theme: 'dark'
  },
  colors: ['#fff']
}

/*
    =================================
        Revenue Monthly | Options
    =================================
*/

$mois_0_book=parseInt(document.getElementById("mois_0_book").value);
$mois_0_book_pur=parseInt(document.getElementById("mois_0_book_pur").value);
$mois_1_book=parseInt(document.getElementById("mois_1_book").value);
$mois_1_book_pur=parseInt(document.getElementById("mois_1_book_pur").value);
$mois_2_book=parseInt(document.getElementById("mois_2_book").value);
$mois_2_book_pur=parseInt(document.getElementById("mois_2_book_pur").value);
$mois_3_book=parseInt(document.getElementById("mois_3_book").value);
$mois_3_book_pur=parseInt(document.getElementById("mois_3_book_pur").value);
$mois_4_book=parseInt(document.getElementById("mois_4_book").value);
$mois_4_book_pur=parseInt(document.getElementById("mois_4_book_pur").value);
$mois_5_book=parseInt(document.getElementById("mois_5_book").value);
$mois_5_book_pur=parseInt(document.getElementById("mois_5_book_pur").value);
$mois_6_book=parseInt(document.getElementById("mois_6_book").value);
$mois_6_book_pur=parseInt(document.getElementById("mois_6_book_pur").value);
$mois_7_book=parseInt(document.getElementById("mois_7_book").value);
$mois_7_book_pur=parseInt(document.getElementById("mois_7_book_pur").value);
$mois_8_book=parseInt(document.getElementById("mois_8_book").value);
$mois_8_book_pur=parseInt(document.getElementById("mois_8_book_pur").value);
$mois_9_book=parseInt(document.getElementById("mois_9_book").value);
$mois_9_book_pur=parseInt(document.getElementById("mois_9_book_pur").value);
$mois_10_book=parseInt(document.getElementById("mois_10_book").value);
$mois_10_book_pur=parseInt(document.getElementById("mois_10_book_pur").value);
$mois_11_book=parseInt(document.getElementById("mois_11_book").value);
$mois_11_book_pur=parseInt(document.getElementById("mois_11_book_pur").value);
$total_Booking_purchsing=parseInt(document.getElementById("total_Booking_purchsing").value).toLocaleString();
$total_Booking_selling=parseInt(document.getElementById("total_Booking_selling").value).toLocaleString();
  // alert($mois_1_book);
// $res_count_st_cn=parseInt(document.getElementById("res_count_st_cn").value);
// alert($res_count_st_cn);
// $res_count_st_KUN=parseInt(document.getElementById("res_count_st_KUN").value);
// alert($res_count_st_KUN);
// $res_count_st_CN_FEE=parseInt(document.getElementById("res_count_st_CN_FEE").value);
// alert($res_count_st_CN_FEE);
// $res_count_stCN_NRF=parseInt(document.getElementById("res_count_stCN_NRF").value);
// alert($res_count_stCN_NRF);
// $res_count_st_NO_SHOW=parseInt(document.getElementById("res_count_st_NO_SHOW").value);
var options1 = {
  chart: {
    fontFamily: 'Nunito, sans-serif',
    height: 365,
    type: 'area',
    zoom: {
        enabled: false
    },
    dropShadow: {
      enabled: true,
      opacity: 0.3,
      blur: 5,
      left: -7,
      top: 22
    },
    toolbar: {
      show: false
    },
    events: {
      mounted: function(ctx, config) {
        const highest1 = ctx.getHighestValueInSeries(0);
        const highest2 = ctx.getHighestValueInSeries(1);

        ctx.addPointAnnotation({
          x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
          y: highest1,
          label: {
            style: {
              cssClass: 'd-none'
            }
          },
          customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#00FF00" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
          }
        })

        ctx.addPointAnnotation({
          x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
          y: highest2,
          label: {
            style: {
              cssClass: 'd-none'
            }
          },
          customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#e7515a" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
          }
        })
      },
    }
  },
  colors: ['#00FF00', '#e7515a'],
  dataLabels: {
      enabled: false
  },
  markers: {
    discrete: [{
    seriesIndex: 0,
    dataPointIndex: 7,
    fillColor: '#000',
    strokeColor: '#000',
    size: 5
  }, {
    seriesIndex: 2,
    dataPointIndex: 11,
    fillColor: '#000',
    strokeColor: '#000',
    size: 4
  }]
  },
  subtitle: {
    text: 'selling '+' '+ ' purchsing',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 35,
    floating: false,
    style: {
      fontSize: '14px',
      color:  '#888ea8'
    }
  },
  title: {
    text: $total_Booking_selling+' € '+$total_Booking_purchsing+' €',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 0,
    floating: false,
    style: {
      fontSize: '25px',
      color:  '#bfc9d4'
    },
  },
  stroke: {
      show: true,
      curve: 'smooth',
      width: 2,
      lineCap: 'square'
  },
  series: [{
      name: 'Selling',
      // data: [$mois_0_book,mois_1_book,0, 0,0,0,0,0,0,0, 0,0]
      data: [$mois_0_book,$mois_1_book,$mois_2_book, $mois_3_book,$mois_4_book,$mois_5_book,$mois_6_book,$mois_7_book,$mois_8_book,$mois_9_book, $mois_10_book,$mois_11_book]
  }, {
      name: 'Purchase',
      data: [$mois_0_book_pur,$mois_1_book_pur,$mois_2_book_pur, $mois_3_book_pur,$mois_4_book_pur,$mois_5_book_pur,$mois_6_book_pur,$mois_7_book_pur,$mois_8_book_pur,$mois_9_book_pur, $mois_10_book_pur,$mois_11_book_pur]
  }],
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  xaxis: {
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    crosshairs: {
      show: true
    },
    labels: {
      offsetX: 0,
      offsetY: 5,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-xaxis-title',
      },
    }
  },
  yaxis: {
    labels: {
      formatter: function(value, index) {
        return (value / 1000) + 'K'
      },
      offsetX: -22,
      offsetY: 0,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-yaxis-title',
      },
    }
  },
  grid: {
    borderColor: '#191e3a',
    strokeDashArray: 5,
    xaxis: {
        lines: {
            show: true
        }
    },   
    yaxis: {
        lines: {
            show: false,
        }
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: -10
    }, 
  }, 
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    offsetY: -50,
    fontSize: '16px',
    fontFamily: 'Nunito, sans-serif',
    markers: {
      width: 10,
      height: 10,
      strokeWidth: 0,
      strokeColor: '#fff',
      fillColors: undefined,
      radius: 12,
      onClick: undefined,
      offsetX: 0,
      offsetY: 0
    },    
    itemMargin: {
      horizontal: 0,
      vertical: 20
    }
  },
  tooltip: {
    theme: 'dark',
    marker: {
      show: true,
    },
    x: {
      show: false,
    }
  },
  fill: {
      type:"gradient",
      gradient: {
          type: "vertical",
          shadeIntensity: 1,
          inverseColors: !1,
          opacityFrom: .28,
          opacityTo: .05,
          stops: [45, 100]
      }
  },
  responsive: [{
    breakpoint: 575,
    options: {
      legend: {
          offsetY: -30,
      },
    },
  }]
}

/*
    =================================
        Revenue Monthly | Options | chekin
    =================================
*/
$mois_0_chekin=parseInt(document.getElementById("mois_0_chekin").value);
$mois_0_chekin_pur=parseInt(document.getElementById("mois_0_chekin_pur").value);
$mois_1_chekin=parseInt(document.getElementById("mois_1_chekin").value);
$mois_1_chekin_pur=parseInt(document.getElementById("mois_1_chekin_pur").value);
$mois_2_chekin=parseInt(document.getElementById("mois_2_chekin").value);
$mois_2_chekin_pur=parseInt(document.getElementById("mois_2_chekin_pur").value);
$mois_3_chekin=parseInt(document.getElementById("mois_3_chekin").value);
$mois_3_chekin_pur=parseInt(document.getElementById("mois_3_chekin_pur").value);
$mois_4_chekin=parseInt(document.getElementById("mois_4_chekin").value);
$mois_4_chekin_pur=parseInt(document.getElementById("mois_4_chekin_pur").value);
$mois_5_chekin=parseInt(document.getElementById("mois_5_chekin").value);
$mois_5_chekin_pur=parseInt(document.getElementById("mois_5_chekin_pur").value);
$mois_6_chekin=parseInt(document.getElementById("mois_6_chekin").value);
$mois_6_chekin_pur=parseInt(document.getElementById("mois_6_chekin_pur").value);
$mois_7_chekin=parseInt(document.getElementById("mois_7_chekin").value);
$mois_7_chekin_pur=parseInt(document.getElementById("mois_7_chekin_pur").value);
$mois_8_chekin=parseInt(document.getElementById("mois_8_chekin").value);
$mois_8_chekin_pur=parseInt(document.getElementById("mois_8_chekin_pur").value);
$mois_9_chekin=parseInt(document.getElementById("mois_9_chekin").value);
$mois_9_chekin_pur=parseInt(document.getElementById("mois_9_chekin_pur").value);
$mois_10_chekin=parseInt(document.getElementById("mois_10_chekin").value);
$mois_10_chekin_pur=parseInt(document.getElementById("mois_10_chekin_pur").value);
$mois_11_chekin=parseInt(document.getElementById("mois_11_chekin").value);
$mois_11_chekin_pur=parseInt(document.getElementById("mois_11_chekin_pur").value);

$total_checkin_purchsing=parseInt(document.getElementById("total_checkin_purchsing").value).toLocaleString();
$total_checkin_selling=parseInt(document.getElementById("total_checkin_selling").value).toLocaleString();
  // alert($mois_1_book);
// $res_count_st_cn=parseInt(document.getElementById("res_count_st_cn").value);
// alert($res_count_st_cn);
// $res_count_st_KUN=parseInt(document.getElementById("res_count_st_KUN").value);
// alert($res_count_st_KUN);
// $res_count_st_CN_FEE=parseInt(document.getElementById("res_count_st_CN_FEE").value);
// alert($res_count_st_CN_FEE);
// $res_count_stCN_NRF=parseInt(document.getElementById("res_count_stCN_NRF").value);
// alert($res_count_stCN_NRF);
// $res_count_st_NO_SHOW=parseInt(document.getElementById("res_count_st_NO_SHOW").value);
var options2_chek = {
  chart: {
    fontFamily: 'Nunito, sans-serif',
    height: 365,
    type: 'area',
    zoom: {
        enabled: false
    },
    dropShadow: {
      enabled: true,
      opacity: 0.3,
      blur: 5,
      left: -7,
      top: 22
    },
    toolbar: {
      show: false
    },
    events: {
      mounted: function(ctx, config) {
        const highest1 = ctx.getHighestValueInSeries(0);
        const highest2 = ctx.getHighestValueInSeries(1);

        ctx.addPointAnnotation({
          x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
          y: highest1,
          label: {
            style: {
              cssClass: 'd-none'
            }
          },
          customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#00FF00" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
          }
        })

        ctx.addPointAnnotation({
          x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
          y: highest2,
          label: {
            style: {
              cssClass: 'd-none'
            }
          },
          customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#e7515a" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
          }
        })
      },
    }
  },
  colors: ['#00FF00', '#e7515a'],
  dataLabels: {
      enabled: false
  },
  markers: {
    discrete: [{
    seriesIndex: 0,
    dataPointIndex: 7,
    fillColor: '#000',
    strokeColor: '#000',
    size: 5
  }, {
    seriesIndex: 2,
    dataPointIndex: 11,
    fillColor: '#000',
    strokeColor: '#000',
    size: 4
  }]
  },
  subtitle: {
    text: 'selling '+' '+ ' purchsing',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 35,
    floating: false,
    style: {
      fontSize: '14px',
      color:  '#888ea8'
    }
  },
  title: {
    text: $total_checkin_selling+' € '+$total_checkin_purchsing+' €',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 0,
    floating: false,
    style: {
      fontSize: '25px',
      color:  '#bfc9d4'
    },
  },
  stroke: {
      show: true,
      curve: 'smooth',
      width: 2,
      lineCap: 'square'
  },
  series: [{
      name: 'Selling',
      // data: [$mois_0_book,mois_1_book,0, 0,0,0,0,0,0,0, 0,0]
      data: [$mois_0_chekin,$mois_1_chekin,$mois_2_chekin, $mois_3_chekin,$mois_4_chekin,$mois_5_chekin,$mois_6_chekin,$mois_7_chekin,$mois_8_chekin,$mois_9_chekin, $mois_10_chekin,$mois_11_chekin]
  }, {
      name: 'Purchase',
      data: [$mois_0_chekin_pur,$mois_1_chekin_pur,$mois_2_chekin_pur, $mois_3_chekin_pur,$mois_4_chekin_pur,$mois_5_chekin_pur,$mois_6_chekin_pur,$mois_7_chekin_pur,$mois_8_chekin_pur,$mois_9_chekin_pur, $mois_10_chekin_pur,$mois_11_chekin_pur]
  }],
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  xaxis: {
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    crosshairs: {
      show: true
    },
    labels: {
      offsetX: 0,
      offsetY: 5,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-xaxis-title',
      },
    }
  },
  yaxis: {
    labels: {
      formatter: function(value, index) {
        return (value / 1000) + 'K'
      },
      offsetX: -22,
      offsetY: 0,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-yaxis-title',
      },
    }
  },
  grid: {
    borderColor: '#191e3a',
    strokeDashArray: 5,
    xaxis: {
        lines: {
            show: true
        }
    },   
    yaxis: {
        lines: {
            show: false,
        }
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: -10
    }, 
  }, 
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    offsetY: -50,
    fontSize: '16px',
    fontFamily: 'Nunito, sans-serif',
    markers: {
      width: 10,
      height: 10,
      strokeWidth: 0,
      strokeColor: '#fff',
      fillColors: undefined,
      radius: 12,
      onClick: undefined,
      offsetX: 0,
      offsetY: 0
    },    
    itemMargin: {
      horizontal: 0,
      vertical: 20
    }
  },
  tooltip: {
    theme: 'dark',
    marker: {
      show: true,
    },
    x: {
      show: false,
    }
  },
  fill: {
      type:"gradient",
      gradient: {
          type: "vertical",
          shadeIntensity: 1,
          inverseColors: !1,
          opacityFrom: .28,
          opacityTo: .05,
          stops: [45, 100]
      }
  },
  responsive: [{
    breakpoint: 575,
    options: {
      legend: {
          offsetY: -30,
      },
    },
  }]
}
/*
    =================================
        Revenue Monthly | Options | chekout 
    =================================
*/
$mois_0_chek=parseInt(document.getElementById("mois_0_chek").value);
$mois_0_chek_pur=parseInt(document.getElementById("mois_0_chek_pur").value);
$mois_1_chek=parseInt(document.getElementById("mois_1_chek").value);
$mois_1_chek_pur=parseInt(document.getElementById("mois_1_chek_pur").value);
$mois_2_chek=parseInt(document.getElementById("mois_2_chek").value);
$mois_2_chek_pur=parseInt(document.getElementById("mois_2_chek_pur").value);
$mois_3_chek=parseInt(document.getElementById("mois_3_chek").value);
$mois_3_chek_pur=parseInt(document.getElementById("mois_3_chek_pur").value);
$mois_4_chek=parseInt(document.getElementById("mois_4_chek").value);
$mois_4_chek_pur=parseInt(document.getElementById("mois_4_chek_pur").value);
$mois_5_chek=parseInt(document.getElementById("mois_5_chek").value);
$mois_5_chek_pur=parseInt(document.getElementById("mois_5_chek_pur").value);
$mois_6_chek=parseInt(document.getElementById("mois_6_chek").value);
$mois_6_chek_pur=parseInt(document.getElementById("mois_6_chek_pur").value);
$mois_7_chek=parseInt(document.getElementById("mois_7_chek").value);
$mois_7_chek_pur=parseInt(document.getElementById("mois_7_chek_pur").value);
$mois_8_chek=parseInt(document.getElementById("mois_8_chek").value);
$mois_8_chek_pur=parseInt(document.getElementById("mois_8_chek_pur").value);
$mois_9_chek=parseInt(document.getElementById("mois_9_chek").value);
$mois_9_chek_pur=parseInt(document.getElementById("mois_9_chek_pur").value);
$mois_10_chek=parseInt(document.getElementById("mois_10_chek").value);
$mois_10_chek_pur=parseInt(document.getElementById("mois_10_chek_pur").value);
$mois_11_chek=parseInt(document.getElementById("mois_11_chek").value);
$mois_11_chek_pur=parseInt(document.getElementById("mois_11_chek_pur").value);

$total_checkout_purchsing=parseInt(document.getElementById("total_checkout_purchsing").value).toLocaleString();
$total_checkout_selling=parseInt(document.getElementById("total_checkout_selling").value).toLocaleString();
  // alert($mois_1_book);
// $res_count_st_cn=parseInt(document.getElementById("res_count_st_cn").value);
// alert($res_count_st_cn);
// $res_count_st_KUN=parseInt(document.getElementById("res_count_st_KUN").value);
// alert($res_count_st_KUN);
// $res_count_st_CN_FEE=parseInt(document.getElementById("res_count_st_CN_FEE").value);
// alert($res_count_st_CN_FEE);
// $res_count_stCN_NRF=parseInt(document.getElementById("res_count_stCN_NRF").value);
// alert($res_count_stCN_NRF);
// $res_count_st_NO_SHOW=parseInt(document.getElementById("res_count_st_NO_SHOW").value);
var options1_chek = {
  chart: {
    fontFamily: 'Nunito, sans-serif',
    height: 365,
    type: 'area',
    zoom: {
        enabled: false
    },
    dropShadow: {
      enabled: true,
      opacity: 0.3,
      blur: 5,
      left: -7,
      top: 22
    },
    toolbar: {
      show: false
    },
    events: {
      mounted: function(ctx, config) {
        const highest1 = ctx.getHighestValueInSeries(0);
        const highest2 = ctx.getHighestValueInSeries(1);

        ctx.addPointAnnotation({
          x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
          y: highest1,
          label: {
            style: {
              cssClass: 'd-none'
            }
          },
          customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#00FF00" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
          }
        })

        ctx.addPointAnnotation({
          x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
          y: highest2,
          label: {
            style: {
              cssClass: 'd-none'
            }
          },
          customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#e7515a" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
          }
        })
      },
    }
  },
  colors: ['#00FF00', '#e7515a'],
  dataLabels: {
      enabled: false
  },
  markers: {
    discrete: [{
    seriesIndex: 0,
    dataPointIndex: 7,
    fillColor: '#000',
    strokeColor: '#000',
    size: 5
  }, {
    seriesIndex: 2,
    dataPointIndex: 11,
    fillColor: '#000',
    strokeColor: '#000',
    size: 4
  }]
  },
  subtitle: {
    text: 'selling '+' '+ ' purchsing',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 35,
    floating: false,
    style: {
      fontSize: '14px',
      color:  '#888ea8'
    }
  },
  title: {
    text: $total_checkout_selling+' € '+$total_checkout_purchsing+' €',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 0,
    floating: false,
    style: {
      fontSize: '25px',
      color:  '#bfc9d4'
    },
  },
  stroke: {
      show: true,
      curve: 'smooth',
      width: 2,
      lineCap: 'square'
  },
  series: [{
      name: 'Selling',
      // data: [$mois_0_book,mois_1_book,0, 0,0,0,0,0,0,0, 0,0]
      data: [$mois_0_chek,$mois_1_chek,$mois_2_chek, $mois_3_chek,$mois_4_chek,$mois_5_chek,$mois_6_chek,$mois_7_chek,$mois_8_chek,$mois_9_chek, $mois_10_chek,$mois_11_chek]
  }, {
      name: 'Purchase',
      data: [$mois_0_chek_pur,$mois_1_chek_pur,$mois_2_chek_pur, $mois_3_chek_pur,$mois_4_chek_pur,$mois_5_chek_pur,$mois_6_chek_pur,$mois_7_chek_pur,$mois_8_chek_pur,$mois_9_chek_pur, $mois_10_chek_pur,$mois_11_chek_pur]
  }],
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  xaxis: {
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    crosshairs: {
      show: true
    },
    labels: {
      offsetX: 0,
      offsetY: 5,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-xaxis-title',
      },
    }
  },
  yaxis: {
    labels: {
      formatter: function(value, index) {
        return (value / 1000) + 'K'
      },
      offsetX: -22,
      offsetY: 0,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-yaxis-title',
      },
    }
  },
  grid: {
    borderColor: '#191e3a',
    strokeDashArray: 5,
    xaxis: {
        lines: {
            show: true
        }
    },   
    yaxis: {
        lines: {
            show: false,
        }
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: -10
    }, 
  }, 
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    offsetY: -50,
    fontSize: '16px',
    fontFamily: 'Nunito, sans-serif',
    markers: {
      width: 10,
      height: 10,
      strokeWidth: 0,
      strokeColor: '#fff',
      fillColors: undefined,
      radius: 12,
      onClick: undefined,
      offsetX: 0,
      offsetY: 0
    },    
    itemMargin: {
      horizontal: 0,
      vertical: 20
    }
  },
  tooltip: {
    theme: 'dark',
    marker: {
      show: true,
    },
    x: {
      show: false,
    }
  },
  fill: {
      type:"gradient",
      gradient: {
          type: "vertical",
          shadeIntensity: 1,
          inverseColors: !1,
          opacityFrom: .28,
          opacityTo: .05,
          stops: [45, 100]
      }
  },
  responsive: [{
    breakpoint: 575,
    options: {
      legend: {
          offsetY: -30,
      },
    },
  }]
}
/*
    ==================================
        Sales By Category | Options
    ==================================
*/

 $res_ok=parseInt(document.getElementById("res_ok").value);
//  alert($res_ok);
$res_count_st_cn=parseInt(document.getElementById("res_count_st_cn").value);
// alert($res_count_st_cn);
$res_count_st_KUN=parseInt(document.getElementById("res_count_st_KUN").value);
// alert($res_count_st_KUN);
$res_count_st_CN_FEE=parseInt(document.getElementById("res_count_st_CN_FEE").value);
// alert($res_count_st_CN_FEE);
$res_count_stCN_NRF=parseInt(document.getElementById("res_count_stCN_NRF").value);
// alert($res_count_stCN_NRF);
$res_count_st_NO_SHOW=parseInt(document.getElementById("res_count_st_NO_SHOW").value);
// alert($res_count_st_NO_SHOW);

// let fgp_array = [res_ok, res_count_st_cn, res_count_st_KUN, res_count_st_CN_FEE, res_count_stCN_NRF, res_count_st_NO_SHOW];
$data=[$res_ok, $res_count_st_cn, $res_count_st_KUN, $res_count_st_CN_FEE,$res_count_stCN_NRF,$res_count_st_NO_SHOW];
// alrt($res_ok);
var options = {
   
    chart: {
        type: 'donut',
        width: 380
    },
    colors: ['#00FF00', '#e7515a','#5c1ac3', '#e2a03f', '#e2a03f', '#5c1ac3'],
    dataLabels: {
      enabled: false
    },
    legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        fontSize: '14px',
        markers: {
          width: 10,
          height: 10,
        },
        itemMargin: {
          horizontal: 0,
          vertical: 8
        }
    },
    plotOptions: {
      pie: {
        donut: {
          size: '65%',
          background: 'transparent',
          labels: {
            show: true,
            name: {
              show: true,
              fontSize: '29px',
              fontFamily: 'Nunito, sans-serif',
              color: undefined,
              offsetY: -10
            },
            value: {
              show: true,
              fontSize: '26px',
              fontFamily: 'Nunito, sans-serif',
              color: '#bfc9d4',
              offsetY: 16,
              formatter: function (val) {
                return val
              }
            },
            total: {
              show: true,
              showAlways: true,
              label: 'Total',
              color: '#888ea8',
              formatter: function (w) {
                return w.globals.seriesTotals.reduce( function(a, b) {
                  return a + b
                }, 0)
              }
            }
          }
        }
      }
    },
    stroke: {
      show: true,
      width: 25,
      colors: '#0e1726'
    },
    // series: [$res_ok,$res_count_st_cn,$res_count_st_KUN,$res_count_st_CN_FEE,$res_count_stCN_NRF,$res_count_st_NO_SHOW],
    // series:[$res_ok,$res_count_st_cn,$res_count_st_KUN,$res_count_st_CN_FEE,$res_count_stCN_NRF,$res_count_st_NO_SHOW],
 
    series: $data,
    labels: ['OK','CN', 'KUN', 'CN FEE','CN NRF','NO SHOW'],
    responsive: [{
        breakpoint: 1599,
        options: {
            chart: {
                width: '350px',
                height: '400px'
            },
            legend: {
                position: 'bottom'
            }
        },

        breakpoint: 1439,
        options: {
            chart: {
                width: '250px',
                height: '390px'
            },
            legend: {
                position: 'bottom'
            },
            plotOptions: {
              pie: {
                donut: {
                  size: '65%',
                }
              }
            }
        },
    }]
}

 /*
        ===================================
            Unique Visitors | Options
        ===================================
    */


$mois_0_parans=parseInt(document.getElementById("mois_0_parans").value);

$mois_1_parans=parseInt(document.getElementById("mois_1_parans").value);

$mois_2_parans=parseInt(document.getElementById("mois_2_parans").value);

$mois_3_parans=parseInt(document.getElementById("mois_3_parans").value);

$mois_4_parans=parseInt(document.getElementById("mois_4_parans").value);

$mois_5_parans=parseInt(document.getElementById("mois_5_parans").value);

$mois_6_parans=parseInt(document.getElementById("mois_6_parans").value);

$mois_7_parans=parseInt(document.getElementById("mois_7_parans").value);

$mois_8_parans=parseInt(document.getElementById("mois_8_parans").value);

$mois_9_parans=parseInt(document.getElementById("mois_9_parans").value);

$mois_10_parans=parseInt(document.getElementById("mois_10_parans").value);

$mois_11_parans=parseInt(document.getElementById("mois_11_parans").value);


        var d_1options1 = {
          chart: {
              height: 350,
              type: 'bar',
              toolbar: {
                show: false,
              },
              dropShadow: {
                  enabled: true,
                  top: 1,
                  left: 1,
                  blur: 1,
                  color: '#515365',
                  opacity: 0.3,
              }
          },
          colors: ['#5c1ac3', '#ffbb44'],
          plotOptions: {
              bar: {
                  horizontal: false,
                  columnWidth: '55%',
                  endingShape: 'rounded'  
              },
          },
          dataLabels: {
              enabled: false
          },
          legend: {
                position: 'bottom',
                horizontalAlign: 'center',
                fontSize: '14px',
                markers: {
                  width: 10,
                  height: 10,
                },
                itemMargin: {
                  horizontal: 0,
                  vertical: 8
                }
          },
          grid: {
            borderColor: '#191e3a',
          },
          stroke: {
              show: true,
              width: 2,
              colors: ['transparent']
          },
          series: [{
              name: '2022',
              // data: [58, 44, 55, 57, 56, 61, 58, 63, 60, 66, 56, 63]
              data: [$mois_0_parans,$mois_1_parans,$mois_2_parans, $mois_3_parans,$mois_4_parans,$mois_5_parans,$mois_6_parans,$mois_7_parans,$mois_8_parans,$mois_9_parans, $mois_10_parans,$mois_11_parans]

          }, {
              name: '2023',
              data: [$mois_0_book,$mois_1_book,$mois_2_book, $mois_3_book,$mois_4_book,$mois_5_book,$mois_6_book,$mois_7_book,$mois_8_book,$mois_9_book, $mois_10_book,$mois_11_book]

          }],
          xaxis: {
              categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          },
          fill: {
            type: 'gradient',
            gradient: {
              shade: 'dark',
              type: 'vertical',
              shadeIntensity: 0.3,
              inverseColors: false,
              opacityFrom: 1,
              opacityTo: 0.8,
              stops: [0, 100]
            }
          },
          tooltip: {
            theme: 'dark',
              y: {
                  formatter: function (val) {
                      return val
                  }
              }
          }
        }

$mois_0_parans_checkout=parseInt(document.getElementById("mois_0_parans_checkout").value);

$mois_1_parans_checkout=parseInt(document.getElementById("mois_1_parans_checkout").value);

$mois_2_parans_checkout=parseInt(document.getElementById("mois_2_parans_checkout").value);

$mois_3_parans_checkout=parseInt(document.getElementById("mois_3_parans_checkout").value);

$mois_4_parans_checkout=parseInt(document.getElementById("mois_4_parans_checkout").value);

$mois_5_parans_checkout=parseInt(document.getElementById("mois_5_parans_checkout").value);

$mois_6_parans_checkout=parseInt(document.getElementById("mois_6_parans_checkout").value);

$mois_7_parans_checkout=parseInt(document.getElementById("mois_7_parans_checkout").value);

$mois_8_parans_checkout=parseInt(document.getElementById("mois_8_parans_checkout").value);

$mois_9_parans_checkout=parseInt(document.getElementById("mois_9_parans_checkout").value);

$mois_10_parans_checkout=parseInt(document.getElementById("mois_10_parans_checkout").value);

$mois_11_parans_checkout=parseInt(document.getElementById("mois_11_parans_checkout").value);
        var d_1options1_checkout = {
          chart: {
              height: 350,
              type: 'bar',
              toolbar: {
                show: false,
              },
              dropShadow: {
                  enabled: true,
                  top: 1,
                  left: 1,
                  blur: 1,
                  color: '#515365',
                  opacity: 0.3,
              }
          },
          colors: ['#5c1ac3', '#ffbb44'],
          plotOptions: {
              bar: {
                  horizontal: false,
                  columnWidth: '55%',
                  endingShape: 'rounded'  
              },
          },
          dataLabels: {
              enabled: false
          },
          legend: {
                position: 'bottom',
                horizontalAlign: 'center',
                fontSize: '14px',
                markers: {
                  width: 10,
                  height: 10,
                },
                itemMargin: {
                  horizontal: 0,
                  vertical: 8
                }
          },
          grid: {
            borderColor: '#191e3a',
          },
          stroke: {
              show: true,
              width: 2,
              colors: ['transparent']
          },
          series: [{
              name: '2022',
              // data: [58, 44, 55, 57, 56, 61, 58, 63, 60, 66, 56, 63]
              data: [$mois_0_parans_checkout,$mois_1_parans_checkout,$mois_2_parans_checkout, $mois_3_parans_checkout,$mois_4_parans_checkout,$mois_5_parans_checkout,$mois_6_parans_checkout,$mois_7_parans_checkout,$mois_8_parans_checkout,$mois_9_parans_checkout, $mois_10_parans_checkout,$mois_11_parans_checkout]

          }, {
              name: '2023',
              data: [$mois_0_chek,$mois_1_chek,$mois_2_chek, $mois_3_chek,$mois_4_chek,$mois_5_chek,$mois_6_chek,$mois_7_chek,$mois_8_chek,$mois_9_chek, $mois_10_chek,$mois_11_chek]

          }],
          xaxis: {
              categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          },
          fill: {
            type: 'gradient',
            gradient: {
              shade: 'dark',
              type: 'vertical',
              shadeIntensity: 0.3,
              inverseColors: false,
              opacityFrom: 1,
              opacityTo: 0.8,
              stops: [0, 100]
            }
          },
          tooltip: {
            theme: 'dark',
              y: {
                  formatter: function (val) {
                      return val
                  }
              }
          }
        }

        $mois_0_parans_checkin=parseInt(document.getElementById("mois_0_parans_checkin").value);

$mois_1_parans_checkin=parseInt(document.getElementById("mois_1_parans_checkin").value);

$mois_2_parans_checkin=parseInt(document.getElementById("mois_2_parans_checkin").value);

$mois_3_parans_checkin=parseInt(document.getElementById("mois_3_parans_checkin").value);

$mois_4_parans_checkin=parseInt(document.getElementById("mois_4_parans_checkin").value);

$mois_5_parans_checkin=parseInt(document.getElementById("mois_5_parans_checkin").value);

$mois_6_parans_checkin=parseInt(document.getElementById("mois_6_parans_checkin").value);

$mois_7_parans_checkin=parseInt(document.getElementById("mois_7_parans_checkin").value);

$mois_8_parans_checkin=parseInt(document.getElementById("mois_8_parans_checkin").value);

$mois_9_parans_checkin=parseInt(document.getElementById("mois_9_parans_checkin").value);

$mois_10_parans_checkin=parseInt(document.getElementById("mois_10_parans_checkin").value);

$mois_11_parans_checkin=parseInt(document.getElementById("mois_11_parans_checkin").value);
        var d_1options1_checkin = {
          chart: {
              height: 350,
              type: 'bar',
              toolbar: {
                show: false,
              },
              dropShadow: {
                  enabled: true,
                  top: 1,
                  left: 1,
                  blur: 1,
                  color: '#515365',
                  opacity: 0.3,
              }
          },
          colors: ['#5c1ac3', '#ffbb44'],
          plotOptions: {
              bar: {
                  horizontal: false,
                  columnWidth: '55%',
                  endingShape: 'rounded'  
              },
          },
          dataLabels: {
              enabled: false
          },
          legend: {
                position: 'bottom',
                horizontalAlign: 'center',
                fontSize: '14px',
                markers: {
                  width: 10,
                  height: 10,
                },
                itemMargin: {
                  horizontal: 0,
                  vertical: 8
                }
          },
          grid: {
            borderColor: '#191e3a',
          },
          stroke: {
              show: true,
              width: 2,
              colors: ['transparent']
          },
          series: [{
              name: '2022',
              // data: [58, 44, 55, 57, 56, 61, 58, 63, 60, 66, 56, 63]
              data: [$mois_0_parans_checkin,$mois_1_parans_checkin,$mois_2_parans_checkin, $mois_3_parans_checkin,$mois_4_parans_checkin,$mois_5_parans_checkin,$mois_6_parans_checkin,$mois_7_parans_checkin,$mois_8_parans_checkin,$mois_9_parans_checkin, $mois_10_parans_checkin,$mois_11_parans_checkin]

          }, {
              name: '2023',
              data: [$mois_0_chekin,$mois_1_chekin,$mois_2_chekin, $mois_3_chekin,$mois_4_chekin,$mois_5_chekin,$mois_6_chekin,$mois_7_chekin,$mois_8_chekin,$mois_9_chekin, $mois_10_chekin,$mois_11_chekin]

          }],
          xaxis: {
              categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          },
          fill: {
            type: 'gradient',
            gradient: {
              shade: 'dark',
              type: 'vertical',
              shadeIntensity: 0.3,
              inverseColors: false,
              opacityFrom: 1,
              opacityTo: 0.8,
              stops: [0, 100]
            }
          },
          tooltip: {
            theme: 'dark',
              y: {
                  formatter: function (val) {
                      return val
                  }
              }
          }
        }

$semaine_0_parans_total=parseInt(document.getElementById("semaine_0_parans_total").value);
$semaine_0_parans_jour=document.getElementById("semaine_0_parans_jour").value;

$semaine_1_parans_total=parseInt(document.getElementById("semaine_1_parans_total").value);
$semaine_1_parans_jour=document.getElementById("semaine_1_parans_jour").value;

$semaine_2_parans_total=parseInt(document.getElementById("semaine_2_parans_total").value);
$semaine_2_parans_jour=document.getElementById("semaine_2_parans_jour").value;

$semaine_3_parans_total=parseInt(document.getElementById("semaine_3_parans_total").value);
$semaine_3_parans_jour=document.getElementById("semaine_3_parans_jour").value;

$semaine_4_parans_total=parseInt(document.getElementById("semaine_4_parans_total").value);
$semaine_4_parans_jour=document.getElementById("semaine_4_parans_jour").value;

$semaine_5_parans_total=parseInt(document.getElementById("semaine_5_parans_total").value);
$semaine_5_parans_jour=document.getElementById("semaine_5_parans_jour").value;

$semaine_6_parans_total=parseInt(document.getElementById("semaine_6_parans_total").value);
$semaine_6_parans_jour=document.getElementById("semaine_6_parans_jour").value;

// $semaine_7_parans_total=parseInt(document.getElementById("semaine_7_parans_total").value);
// $semaine_7_parans_jour=parseInt(document.getElementById("semaine_7_parans_jour").value);


        var d_1options1_semaine = {
          chart: {
              height: 350,
              type: 'bar',
              toolbar: {
                show: false,
              },
              dropShadow: {
                  enabled: true,
                  top: 1,
                  left: 1,
                  blur: 1,
                  color: '#515365',
                  opacity: 0.3,
              }
          },
          colors: ['#00FF00', '#e7515a'],
          plotOptions: {
              bar: {
                  horizontal: false,
                  columnWidth: '55%',
                  endingShape: 'rounded'  
              },
          },
          dataLabels: {
              enabled: false
          },
          legend: {
                position: 'bottom',
                horizontalAlign: 'center',
                fontSize: '14px',
                markers: {
                  width: 10,
                  height: 10,
                },
                itemMargin: {
                  horizontal: 0,
                  vertical: 8
                }
          },
          grid: {
            borderColor: '#191e3a',
          },
          stroke: {
              show: true,
              width: 2,
              colors: ['transparent']
          },
          series: [{
              name: 'Total',
              // data: [58, 44, 55, 57, 56, 61, 58, 63, 60, 66, 56, 63]
              data: [$semaine_0_parans_total,$semaine_1_parans_total,$semaine_2_parans_total, $semaine_3_parans_total,$semaine_4_parans_total,$semaine_5_parans_total,$semaine_6_parans_total]

          }],
          xaxis: {
            categories: [$semaine_0_parans_jour, $semaine_1_parans_jour, $semaine_2_parans_jour, $semaine_3_parans_jour, $semaine_4_parans_jour,$semaine_5_parans_jour,$semaine_6_parans_jour],
          },
          fill: {
            type: 'gradient',
            gradient: {
              shade: 'dark',
              type: 'vertical',
              shadeIntensity: 0.3,
              inverseColors: false,
              opacityFrom: 1,
              opacityTo: 0.8,
              stops: [0, 100]
            }
          },
          tooltip: {
            theme: 'dark',
              y: {
                  formatter: function (val) {
                      return val
                  }
              }
          }
        }
/*
    ==============================
    |    @Render Charts Script    |
    ==============================
*/


/*
    ============================
        Daily Sales | Render
    ============================
*/
var d_2C_1 = new ApexCharts(document.querySelector("#daily-sales"), d_2options1);
d_2C_1.render();

/*
    ============================
        Total Orders | Render
    ============================
*/
var d_2C_2 = new ApexCharts(document.querySelector("#total-orders"), d_2options2);
d_2C_2.render();

/*
    ================================
        Revenue Monthly | Render
    ================================
*/
var chart1 = new ApexCharts(
    document.querySelector("#revenueMonthly"),
    options1
);

chart1.render();

var chart1_check = new ApexCharts(
    document.querySelector("#revenueMonthly_1"),
    options1_chek
);

chart1_check.render();

var chart2_check = new ApexCharts(
  document.querySelector("#revenueMonthly_2"),
  options2_chek
);

chart2_check.render();
  /*
        ===================================
            Unique Visitors | Script
        ===================================
    */

        var d_1C_3 = new ApexCharts(
          document.querySelector("#uniqueVisits"),
          d_1options1
      );
      d_1C_3.render();

      var d_1C_3_checkout = new ApexCharts(
        document.querySelector("#unique_checkout"),
        d_1options1_checkout
    );
    d_1C_3_checkout.render();

    var d_1C_3_checkin = new ApexCharts(
      document.querySelector("#unique_checkin"),
      d_1options1_checkin
  );
  d_1C_3_checkin.render();

  var d_1C_3_semaine = new ApexCharts(
    document.querySelector("#unique_semaine"),
    d_1options1_semaine
);
d_1C_3_semaine.render();


/*
    =================================
        Sales By Category | Render
    =================================
*/
var chart = new ApexCharts(
    document.querySelector("#chart-2"),
    options
);





// $res_ok=document.getElementById("res_ok").value;
// $res_count_st_cn=document.getElementById("res_count_st_cn").value;
// $res_count_st_KUN=document.getElementById("res_count_st_KUN").value;
// $res_count_st_CN_FEE=document.getElementById("res_count_st_CN_FEE").value;
// $res_count_stCN_NRF=document.getElementById("res_count_stCN_NRF").value;
// $res_count_st_NO_SHOW=document.getElementById("res_count_st_NO_SHOW").value;
// let fgp_array = [$res_ok.toString(),$res_count_st_cn.toString(),$res_count_st_KUN.toString(),$res_count_st_CN_FEE.toString(),$res_count_stCN_NRF.toString(),$res_count_st_NO_SHOW.toString()];


// ApexCharts.exec('chart-2', 'updateOptions', {
//   series: fgp_array,
//   //   labels: newLabels
//   })

//   chart.updateSeries([{
//     name: 'FGP',
//     data: fgp_array
// }])
chart.render();
// chart.appendSeries({
//   name: 'ffff',
//   data: [32, 44, 31, 41, 22,10]
// })
// var chart = new ApexCharts(
//   document.querySelector("#chart-2"),
  
// );
// chart.update([
// {
//   name: 'OK',
//   data: 100
// }, {
//   name: 'CN',
//   data: 10
// },{
//   name: 'KUN',
//   data:10
// },{
//   name: 'CN FEE',
//   data: 10
// },{
//   name: 'CN NRF',
//   data: 10
// },{
//   name: 'NO SHOW',
//   data: 10
// }

// ]);


/*
    =============================================
        Perfect Scrollbar | Recent Activities
    =============================================
*/
const ps = new PerfectScrollbar(document.querySelector('.mt-container'));


} catch(e) {
    console.log(e);
}