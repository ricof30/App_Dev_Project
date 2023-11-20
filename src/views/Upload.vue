<!-- <template>
    <div>
      <input type="file" ref="fileInput" @change="handleFileUpload" accept=".xlsx, .xls" />
  
      <table v-if="excelData.length > 0" border="1">
        <thead>
          <tr>
            <th v-for="(key, index) in Object.keys(excelData[0])" :key="index">{{ key }}</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="row in excelData" :key="row._rowNumber">
            <td v-for="key in Object.keys(excelData[0])" :key="key">{{ row[key] }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import * as XLSX from 'xlsx';
  
  export default {
    data() {
      return {
        excelData: [],
      };
    },
    methods: {
      handleFileUpload() {
        const fileInput = this.$refs.fileInput;
        const file = fileInput.files[0];
  
        if (file) {
          this.readExcelFile(file);
        }
      },
      readExcelFile(file) {
        const reader = new FileReader();
  
        reader.onload = (e) => {
          const data = new Uint8Array(e.target.result);
          const workbook = XLSX.read(data, { type: 'array' });
  
          // Assuming the first sheet is the target
          const sheetName = workbook.SheetNames[0];
          const sheet = workbook.Sheets[sheetName];
  
          // Convert sheet data to JSON
          const jsonData = XLSX.utils.sheet_to_json(sheet, { header: 1 });
  
          // Debugging: Log header and rows
          console.log('Header:', jsonData[0]);
          console.log('Rows:', jsonData.slice(1));
  
          // Extract header and data
          const [header, ...rows] = jsonData;
  
          // Create an array of objects with headers as keys
          this.excelData = rows.map((row, index) => {
            const rowData = {};
            header.forEach((key, columnIndex) => {
              rowData[key] = row[columnIndex];
            });
            // Add a unique key for each row
            rowData._rowNumber = index + 1;
            return rowData;
          });
  
          // Debugging: Log the processed Excel data
          console.log('Processed Excel Data:', this.excelData);
        };
  
        reader.readAsArrayBuffer(file);
      },
    },
  };
  </script>
   -->
<!-- 
   <template>
    <div>
      <h2>Upload Excel File</h2>
  
      <form @submit.prevent="uploadFile">
        <label for="file">Select Excel File:</label>
        <input type="file" id="file" ref="fileInput" accept=".xlsx, .xls" required>
        <br>
        <button type="submit">Upload</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    methods: {
        setup() {
    async function loadScript(src) {
      return new Promise((resolve, reject) => {
        const script = document.createElement('script');
        script.src = src;
        script.onload = resolve;
        script.onerror = reject;
        document.head.appendChild(script);
      });
    }

    async function loadScriptsInOrder(scriptUrls) {
      for (const url of scriptUrls) {
        await loadScript(url);
      }
    }

    onMounted(async () => {
        // // await loadScript('../vendor/chart.js/Chart.min.js'); 
        // await loadScript('../vendor/jquery/jquery.min.js'); 
      await loadScriptsInOrder([
      '../js/server.js',    
      ]);
    });
},
      async uploadFile() {
        try {
          const fileInput = this.$refs.fileInput;
          const file = fileInput.files[0];
  
          if (!file) {
            console.error('No file selected');
            return;
          }
  
          const formData = new FormData();
          formData.append('file', file);
  
          const response = await fetch('http://localhost:8000/upload', {
            method: 'POST',
            body: formData,
          });
  
          if (response.ok) {
            console.log('File uploaded successfully.');
          } else {
            console.error('File upload failed.');
          }
        } catch (error) {
          console.error('Internal server error:', error.message);
        }
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
   -->

   <template>
    <div>
      <h2>Upload Excel File</h2>
  
      <form @submit.prevent="uploadFile">
        <label for="file">Select Excel File:</label>
        <input type="file" id="file" ref="fileInput" accept=".xlsx, .xls" required>
        <br>
        <button type="submit">Upload</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    methods: {
      async uploadFile() {
        try {
          const fileInput = this.$refs.fileInput;
          const file = fileInput.files[0];
  
          if (!file) {
            console.error('No file selected');
            return;
          }
  
          const formData = new FormData();
          formData.append('file', file);
  
          const response = await fetch('http://localhost:8080/upload', {
            method: 'POST',
            body: formData,
          });
  
          if (response.ok) {
            console.log('File uploaded successfully.');
          } else {
            console.error('File upload failed.');
          }
        } catch (error) {
          console.error('Internal server error:', error.message);
        }
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  