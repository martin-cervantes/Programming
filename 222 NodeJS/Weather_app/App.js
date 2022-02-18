require('dotenv').config()
const axios = require('axios');

const url = `http://api.weatherstack.com/current?access_key=${process.env.API_KEY}&query=New York`

axios.get(url)
  .then(response => {
    // handle success
    console.log(response);
  })

// console.log('Starting')
//
// setTimeout(() => {
//     console.log('Waiting 2 seconds')
// }, 2000)
//
// setTimeout(() => {
//     console.log('0 seconds')
// }, 0)
//
// console.log('Stopping')
