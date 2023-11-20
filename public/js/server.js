const express = require('express');
const multer = require('multer');
const XLSX = require('xlsx');
const mysql = require('mysql2/promise');

const app = express();
const port = 8080;

// Set up MySQL connection
const dbConfig = {
  host: 'localhost',
  user: 'root',
  password: '',
};

const pool = mysql.createPool(dbConfig);

const storage = multer.memoryStorage();
const upload = multer({ storage: storage });

app.post('/upload', upload.single('file'), async (req, res) => {
  try {
    const file = req.file;

    if (!file) {
      return res.status(400).json({ error: 'No file uploaded' });
    }

    const workbook = XLSX.read(file.buffer, { type: 'buffer' });
    const sheetName = workbook.SheetNames[0];
    const sheet = workbook.Sheets[sheetName];
    const jsonData = XLSX.utils.sheet_to_json(sheet, { header: 1 });

    const dbName = `excel_db_${Date.now()}`;

    // Create a new database
    await pool.query(`CREATE DATABASE IF NOT EXISTS ${dbName}`);
    await pool.query(`USE ${dbName}`);

    try {
      const [header, ...rows] = jsonData;

      // Create a table in the new database
      const createTableQuery = `
        CREATE TABLE IF NOT EXISTS data (
          ${header.map(col => `${col} VARCHAR(255)`).join(', ')}
        )
      `;
      await pool.query(createTableQuery);

      // Insert data into the table
      const insertQuery = `
        INSERT INTO data (${header.join(', ')})
        VALUES ${rows.map(row => `(${row.map(cell => `'${cell}'`).join(', ')})`).join(', ')}
      `;
      await pool.query(insertQuery);

      res.status(200).json({ message: 'File uploaded successfully.' });
    } catch (error) {
      console.error('Error:', error.message);
      res.status(500).json({ error: 'Internal server error.' });
    }
  } catch (error) {
    console.error(error);
    res.status(500).json({ error: 'Internal server error.' });
  }
});

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
