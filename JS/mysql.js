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
connection.query('SELECT * FROM Main', (err, rows) =>{
    if(err) throw err
    const user = rows[0]
    console.log(rows[0].Nombre)
})

