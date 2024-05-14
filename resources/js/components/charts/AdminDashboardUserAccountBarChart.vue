<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 offset-md-9">
                    <select class="form-control" v-model="timeline" v-on:change="filterByTimeline">
                        <option value="Monthly">Monthly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Date">Date Wise</option>
                    </select>                   
                </div>
            </div>
        </div>
        <Bar
            :chart-options="chartOptions"
            :chart-data="chartData"
        />
    </div>
</template>
    
<script>
    import { Bar } from 'vue-chartjs'
    
    import {
        Chart as ChartJS,
        Title,
        Tooltip,
        Legend,
        BarElement,
        CategoryScale,
        LinearScale
    } from 'chart.js'
    
    ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)
    
    export default {
        name: 'BarChart',
        components: {
        Bar
        },
        created(){
        this.getDashboardChartData()
        },
        data() {
        return {
            timeline: 'Monthly',
            chartData: {
            labels: [],
            datasets: [
                {
                label: 'Sales',
                backgroundColor: '#405189',
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
            getDashboardChartData() {
                axios.get('/admin/get-user-account-chart-data')
                    .then(response => (
                        this.chartData.labels = response.data.chart_label,
                        this.chartData.datasets[0].data = response.data.chart_data
                    ))
                    .catch(err => (
                        console.log(err)
                    ))
            },
            filterByTimeline() {
            axios.get('/admin/get-user-account-chart-data?timeline='+this.timeline)
                    .then(response => (
                        this.chartData.labels = response.data.chart_label,
                        this.chartData.datasets[0].data = response.data.chart_data
                    ))
                    .catch(err => (
                        console.log(err)
                    ))
            }
        }
    }
</script>
  