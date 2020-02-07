const mysql = require('mysql')
const https = require('https')

let processedCountries;

https.get('https://restcountries.eu/rest/v2/all', (res) => {
    let data = '';

    // A chunk of data has been recieved.
    res.on('data', (chunk) => {
        data += chunk;
    });

    // The whole response has been received. Print out the result.
    res.on('end', () => {
        const countries = JSON.parse(data);
        
        // const processedCountries = countries.map(country => Object.keys({
        //     'name': country.name,
        //     'capital': country.capital,
        //     'population': country.population,
        //     'flag': country.flag,
        //     'currency': country.currency,
        //     'region': country.region,
        //     'languages': country.languages
        // }).reduce((key, result) => {
            
        //     return [...result, country[key]]
        // }, []));

        processedCountries = countries.map(country => ({
            'name': country.name,
            'capital': country.capital,
            'population': country.population,
            'flag': country.flag,
            'currencies': country.currencies,
            'region': country.region,
            'languages': country.languages
        })).map(country => Object.keys(country).reduce((result, key) => {
            if (key === 'currencies') {
                return [...result, (country[key][0].code + ' (' + country[key][0].symbol + ')')]
            } else if (key === 'languages') {
                return [...result, country[key].map(language => language.name).join(', ')]
            }

            return [...result, country[key]]
        }, []));

        console.log(processedCountries)
        console.log(countries.length)

        connection.connect((err) => {
            if (err) {
                return console.error('error: ' + err.message);
            }

            console.log('Connected to the MySQL server');

            var sqlInsert = "INSERT INTO travel_bucket_countries(name, capital, population, flag, currency, region, languages) VALUES ?";

            connection.query(sqlInsert, [processedCountries], (err, result) => {
                if (err) throw err;

                console.log("Number of records inserted", result.affectedRows);
            });
        })
  });
}).on("error", (err) => {
    console.log("Error: " + err.message);
})

const connection = mysql.createConnection({
    host: 'localhost',
    port: '3308',
    database: 'travel_bucketlist_management_system',
    user: 'root',
    password: ''
})

// connection.end((err) => {
//     if (err) {
//         return console.error('error: ' + err.message);
//     }

//     console.log('Close the database connection.');
// })