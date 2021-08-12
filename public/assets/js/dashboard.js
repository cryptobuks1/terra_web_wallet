"use strict";

!function (NioApp, $) {
    var selector = 'BTC';

    function PriceBalance(selector) {
        var currencyPair = (selector == 'USDT') ? 'USDC_USDT' : 'USDT_' + selector
        var startTimestamp = Math.round((new Date().getTime() / 1000) - 7 * 24 * 60 * 60);
        var url = "https://poloniex.com/public?command=returnChartData&currencyPair=" + currencyPair + "&start=" + startTimestamp + "&end=9999999999999999&period=" + 7200;
        $.ajax(url).done(function (data) {
            if (data["error"]) {
                return;
            }
            var chart_data = [];
            var labels = [];
            var yVal = [];
            for (var i = 0; i < data.length; i++) {
                labels.push(data[i].date);
                yVal.push(Math.round(data[i].weightedAverage * 10000) / 10000);
            }
            chart_data = [{
                label: 'Bitcoin Price',
                tension: .50,
                backgroundColor: 'transparent',
                borderWidth: 2,
                borderColor: '#5ce0aa',
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: '#5ce0aa',
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 2,
                pointRadius: 4,
                pointHitRadius: 4,
                data: yVal
            }];
            var chart = new Chart(document.getElementById(selector + 'PriceBalance').getContext('2d'), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: chart_data
                },
                options: {
                    legend: {
                        display: false
                    },
                    maintainAspectRatio: false,
                    tooltips: {
                        enabled: false,
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            position: NioApp.State.isRTL ? "right" : "left",
                            ticks: {
                                display: false
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                display: false
                            },
                            gridLines: {
                                display: false
                            }
                        }]
                    }
                }
            });
        });

    } // init accountSummary
    NioApp.coms.docReady.push(function () {
        PriceBalance('BTC');
    });

    function StatusChart(selector) {
        var chart_data = [];
        chart_data = [{
            label: 'Bitcoin Price',
            tension: .4,
            borderWidth: 2,
            borderColor: '#5ce0aa',
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: '#5ce0aa',
            pointBorderWidth: 2,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 2,
            pointRadius: 4,
            pointHitRadius: 4,
            data: [30, 20, 10],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
        }];
        var chart = new Chart(document.getElementById(selector + 'StatusChart').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['one', 'two', 'three'],
                    datasets: chart_data
                },
                options: {
                    legend: {
                        display: false
                    },
                    maintainAspectRatio: false,
                    tooltips: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            position: NioApp.State.isRTL ? "right" : "left",
                            ticks: {
                                display: false
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                display: false
                            },
                            gridLines: {
                                display: false
                            }
                        }]
                    }
                }
            }
        );
    }

    NioApp.coms.docReady.push(function () {
        StatusChart('BTC');
    });

    function EscrowChart(selector) {
        var chart_data = [];
        chart_data = [{
            label: 'Bitcoin Price',
            tension: .4,
            borderWidth: 2,
            borderColor: '#5ce0aa',
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: '#5ce0aa',
            pointBorderWidth: 2,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 2,
            pointRadius: 4,
            pointHitRadius: 4,
            data: [30, 20, 10],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
        }];
        var chart = new Chart(document.getElementById(selector + 'EscrowChart').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['one', 'two', 'three'],
                    datasets: chart_data
                },
                options: {
                    legend: {
                        display: false
                    },
                    maintainAspectRatio: false,
                    tooltips: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            position: NioApp.State.isRTL ? "right" : "left",
                            ticks: {
                                display: false
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                display: false
                            },
                            gridLines: {
                                display: false
                            }
                        }]
                    }
                }
            }
        );
    }

    NioApp.coms.docReady.push(function () {
        EscrowChart('BTC');
    });
    $('.coin-list').click(function () {
        selector = $(this).attr('data-symbol');
        $('#BTCStatus').addClass('d-none');
        $('#ETHStatus').addClass('d-none');
        $('#USDTStatus').addClass('d-none');
        $('#XRPStatus').addClass('d-none');
        $('#' + selector + 'Status').removeClass('d-none')
        PriceBalance(selector);
        StatusChart(selector);
        EscrowChart(selector);
    });
    $('#coin_calculator, #usd_calculator').keyup(function () {
        var calculate_amount;
        var coinArea = $('#' + selector + 'Status');
        var coinAmount = parseFloat(coinArea.find(this).val());
        var USDAmount = parseFloat(coinArea.find('#usd_calculator').val());
        var coinPrice = parseFloat(coinArea.find('#coinPrice').val());
        if ($(this).attr('id') == 'coin_calculator') {
            if(isNaN(coinAmount)){
                coinArea.find('#usd_calculator').val(0);
            }else {
                calculate_amount = Math.round(coinAmount * coinPrice * 100) / 100;
                coinArea.find('#usd_calculator').val(calculate_amount);
            }
        }else {
            if(isNaN(USDAmount)){
                coinArea.find('#coin_calculator').val(0);
            }else {
                calculate_amount = Math.round(USDAmount / coinPrice * 100) / 100;
                coinArea.find('#coin_calculator').val(calculate_amount);
            }
        }
    })
}
(NioApp, jQuery);
