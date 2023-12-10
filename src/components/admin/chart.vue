
<template>
  <div class="container mt-5">
    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card bg-primary text-white rounded">
          <div class="card-body">
            <h5 class="card-title text-white">Total Beneficiaries</h5>
            <h2 class="card-text">
              {{ beneficiary.total_beneficiary }}
            </h2>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card bg-success text-white rounded">
          <div class="card-body">
            <h5 class="card-title text-white">Validated Beneficiaries</h5>
            <h2 class="card-text">
              {{ validated.total_validated }}
            </h2>
          </div>
        </div>
      </div>

    <div class="card">
      <div class="card-body h-100">
        <canvas ref="chart" style="height:300px"></canvas>
      </div>
    </div>

    <!-- Display the number of beneficiaries and validated beneficiaries -->
    
    </div>
  </div>
</template>

    
    <script>
    import Chart from 'chart.js/auto';
    import axios from 'axios';
    
    export default {
      data() {
        return {
          beneficiary:[],
          validated:[],
        };
      },
      mounted() {
        this.fetchChartData();
        this.getBeneficiary();
        this.getValidated();
      },
      methods: {
        fetchChartData() {
          axios.get('chart') // Replace with your actual API endpoint
            .then(response => {
              this.chartData = response.data;
              this.renderChart();
            })
            .catch(error => {
              console.error('Error fetching chart data:', error);
            });
        },
        async getBeneficiary(){
                try {
                    const inf = await axios.get('getBeneficiary');
                this.beneficiary = inf.data;
                } catch (error) {
                    console.log(error);
                }
            },
            async getValidated(){
                try {
                    const inf = await axios.get('getValidated');
                this.validated = inf.data;
                } catch (error) {
                    console.log(error);
                }
            },
        renderChart() {
          const ctx = this.$refs.chart.getContext('2d');
    
          new Chart(ctx, {
            type: 'bar', // Change the chart type as needed (e.g., line, pie, etc.)
          data: {
            labels: this.chartData.labels,
            datasets: [{
              label: 'Best Validator/Encoder',
              data: this.chartData.values,
              backgroundColor: [
            'rgb(10, 129, 209)',
            'rgb(49, 76, 182)',
            'rgb(14, 124, 123)',       
                  ],
          borderColor: [
                      'rgb(0,0,0)',
                      'rgb(100, 97, 160)',
                      'rgb(239, 189, 235)',
                      'rgb(49, 76, 182)',
                      'rgb(140, 255, 218)',
                      'rgb(186, 39, 74)',
                      'rgb(255, 251, 70)',
                      'rgb(14, 124, 123)',
                  ],
              borderWidth: 1,
            }],
          },
            options: {
              responsive: true,
              maintainAspectRatio: false,
            },
          });
        },
      },
    };
    </script>
    
    <style scoped>
    /* Add your component-specific styles here */
    </style>
    