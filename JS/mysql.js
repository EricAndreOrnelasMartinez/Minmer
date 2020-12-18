const mysql = require('mysql')

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'Lasric.2018',
    database: 'Users'
})

connection.connect((err) =>{
    if(err) throw err
    console.log('conectado!!')
}
)