const express = require('express');
const app = express();
const userRoutes = require('./routes/userRoutes');
const port = 3000;

app.use('/', userRoutes);

app.listen(port, () => {
    console.log(`Сервер запущен на http://localhost:${port}`);
});