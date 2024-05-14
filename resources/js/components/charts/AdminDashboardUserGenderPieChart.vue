<template>
    <Pie
      :chart-options="chartOptions"
      :chart-data="chartData"
    />
  </template>
  
  <script>
  import { Pie } from 'vue-chartjs'
  
  import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    ArcElement,
    CategoryScale
  } from "chart.js";
  
  ChartJS.register(Title, Tooltip, Legend, ArcElement, CategoryScale);
  
  export default {
    name: 'PieChart',
    components: {
      Pie
    },
    created(){
      this.getAccountByUserGenderChartData()
    },
    data() {
      return {
        chartData: {
          labels: [],
          datasets: [
            {
              backgroundColor: [],
              data: []
            }
          ]
        },
        chartOptions: {
          responsive: true,
          maintainAspectRatio: false
        }
      }
    },
    methods: {
        getAccountByUserGenderChartData() {
            axios.get('/admin/get-user-gender-chart-data')
                .then(response => (
                    this.chartData.labels = response.data.chart_label,
                    this.chartData.datasets[0].data = response.data.chart_data,
                    this.chartData.datasets[0].backgroundColor = response.data.background_color
                ))
                .catch(err => (
                    console.log(err)
                ))
        },
    }
  }
  </script>
  