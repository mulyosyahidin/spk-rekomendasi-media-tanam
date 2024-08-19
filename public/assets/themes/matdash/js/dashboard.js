$(function () {
    var chart = {
        series: dataDiagnosaSemingguTerakhir,
        chart: {
            toolbar: {
                show: false,
            },
            type: "bar",
            fontFamily: "inherit",
            foreColor: "#adb0bb",
            height: 270,
            stacked: true,
            offsetX: -15,
        },
        colors: ["var(--bs-primary)", "var(--bs-danger)"],
        plotOptions: {
            bar: {
                horizontal: false,
                barHeight: "60%",
                columnWidth: "15%",
                borderRadius: [6],
                borderRadiusApplication: "end",
                borderRadiusWhenStacked: "all",
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        grid: {
            show: true,
            padding: {
                top: 0,
                bottom: 0,
                right: 0,
            },
            borderColor: "rgba(0,0,0,0.05)",
            xaxis: {
                lines: {
                    show: true,
                },
            },
            yaxis: {
                lines: {
                    show: true,
                },
            },
        },
        yaxis: {
            min: 0,
            max: 100,
        },
        xaxis: {
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            categories: hariDiagnosaSemingguTerakhir,
            labels: {
                style: {fontSize: "13px", colors: "#adb0bb", fontWeight: "400"},
            },
        },
        yaxis: {
            tickAmount: 1,
        },
        tooltip: {
            theme: "dark",
        },
    };

    var chart = new ApexCharts(
        document.querySelector("#diagnosa-seminggu-terakhir"),
        chart
    );
    chart.render();

    var options = {
        series: jumlahPenyakitTerdiagnosa,
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: penyakitTerdiagnosa,
        legend: {
            show: 0,
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 300
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#penyakit-terdiagnosa"), options);
    chart.render();
})
