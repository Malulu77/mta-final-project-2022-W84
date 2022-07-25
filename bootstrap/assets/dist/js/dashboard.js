/* globals Chart:false, feather:false */

(() => {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  const ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  // const headers = ["a","b","c","d","e","f","g"];
  // const data = [259,122,300,92,123,4,4];

  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        'ספטמבר',
        'אוקטובר',
        'נובמבר',
        'דצמבר',
        'ינואר',
        'פברואר',
        'מרץ'
      ],
      datasets: [{
        data: [
          259,
          122,
          300,
          92,
          123,
          76,
          156
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#a90c11',
        borderWidth: 4,
        pointBackgroundColor: '#ff0000'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
})()
